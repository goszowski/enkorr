<?php
namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class PageController extends RSController
{
    public function view()
    {
      return $this->make_view('pages.view');
    }

    public function author()
    {
      $publications = Model('publication')
                        ->whereRaw("FIND_IN_SET('{$this->fields->node_id}', author_ids) > 0")
                        ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                        ->orderBy('pubdate', 'desc')
                        ->paginate(config('public.pagination.author'));
      return $this->make_view('pages.author', compact('publications'));
    }
}
