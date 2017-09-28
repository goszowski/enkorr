<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class TagController extends RSController
{

    public function view()
    {
      $publications = Model('publication')
                        ->where('tag_ids', 'Like', '%'.$this->fields->node_id.'%')
                        ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                        ->orderBy('pubdate', 'desc')
                        ->get();
      $tags = Model('tag')
                ->orderBy('orderby', 'asc')
                ->get();
      return $this->make_view('tags.view', compact('publications', 'tags'));
    }

}
