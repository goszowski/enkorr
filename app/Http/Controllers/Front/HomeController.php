<?php

/* test */

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;

class HomeController extends RunsiteController
{

    public function index()
    {
      $pages = $this->children('page');
      return $this->make_view('pages.home', [
        'pages' => $pages,
      ]);
    }
}
