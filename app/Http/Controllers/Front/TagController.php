<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class TagController extends RSController
{

    public function view()
    {
      $publications = Model('publication')
                        ->whereRaw("FIND_IN_SET('{$this->fields->node_id}', tag_ids) > 0")
                        ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                        ->orderBy('pubdate', 'desc')
                        ->get();
      $tags = Model('tag')
                ->orderBy('orderby', 'asc')
                ->get();
      return $this->make_view('tags.view', compact('publications', 'tags'));
    }

}
