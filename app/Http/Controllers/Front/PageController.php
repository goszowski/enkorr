<?php
namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;

class PageController extends RunsiteController
{
    public function view()
    {
      return $this->make_view('pages.view');
    }

    public function author()
    {
      $publications = Model('publication')
                        ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                        ->orderBy('pubdate', 'desc')
                        ->get();
      return $this->make_view('pages.author', compact('publications'));
    }
}
