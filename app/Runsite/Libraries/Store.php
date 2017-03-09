<?php

namespace App\Runsite\Libraries;

use App\Runsite\Dynamic;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use DB;
use Carbon\Carbon;
use App\Runsite\Languages;

class Store
{
    protected $modelName;
    protected $nodeName;
    protected $parentId;
    protected $lastModelItem;
    protected $parentNode;
    protected $slug;
    protected $absolutePath;
    protected $class;
    protected $now;
    protected $languages;

    public function node($modelName, $nodeName=null, $parentId=1, $controller='')
    {
        $this->modelName        = $modelName;
        $this->nodeName         = $nodeName;
        $this->parentId         = $parentId;
        $this->lastModelItem    = Model($this->modelName)->where('parent_id', $this->parentId)->orderBy('node_id', 'desc')->first();
        $this->parentNode       = Nodes::where('id', $this->parentId)->first();
        $this->class            = Classes::where('shortname', $modelName)->first();
        $this->now              = Carbon::now();
        $this->languages        = Languages::where('is_active', true)->get();

        $this->absolutePath = $this->generateAbsulutePath();

        $node = Nodes::create([
            'parent_id' => $this->parentId,
            'class_id' => $this->class->id,
            'subtree_order' => $this->getOrderNumber(),
            'shortname' => $this->slug,
            'absolute_path' => $this->absolutePath,
            'controller' => $controller,
        ]);

        foreach($this->languages as $language)
        {
            DB::table('_class_' . $this->modelName)->insert([
                'node_id' => $node->id,
                'parent_id' => $this->parentId,
                'orderby' => $this->getOrderNumber(),
                'language_id' => $language->id,
                'created_at' => $this->now,
                'updated_at' => $this->now,
            ]);
        }

        $output = new \stdClass;
        foreach($this->languages as $language)
        {
            $dynamic = new Dynamic('_class_'.$this->modelName);
            $output->{$language->locale} = $dynamic->where('language_id', $language->id)->where('node_id', $node->id)->first();
        }

        return $output;
    }

    public function generateAbsulutePath()
    {
        if($this->nodeName)
        {
            $this->slug = str_slug($this->nodeName);
        }
        else
        {
            $this->slug = $this->getSlugId();
        }

        if($this->lastModelItem and $this->lastModelItem->node->shortname == $this->slug)
        {
            $this->slug .= '-' . $this->getSlugId();
        }

        $mergedAbsolutePath = $this->mergeAbsolutePath();

        if(Nodes::where('absolute_path', $mergedAbsolutePath)->count())
        {
            $mergedAbsolutePath .= '-' . $this->getSlugId();
        }

        return $mergedAbsolutePath;
    }

    public function getSlugId()
    {
        $existingNode = Nodes::where('class_id', $this->class->id)->orderBy('id', 'desc')->first();
        return $existingNode ? $existingNode->id + 1 : 1;
    }

    public function mergeAbsolutePath()
    {
        $separator = '/';
        if($this->parentNode->absolute_path == '/')
        {
            $separator = null;
        }

        return $this->parentNode->absolute_path . $separator . $this->slug;
    }

    public function getOrderNumber()
    {
        return $this->lastModelItem ? $this->lastModelItem->orderby + 1 : 1;
    }
}
