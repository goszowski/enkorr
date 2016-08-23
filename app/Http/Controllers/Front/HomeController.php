<?php

/* test */

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;
use App\Runsite\Libraries\Node;

class HomeController extends RunsiteController
{

    public function index()
    {
      return $this->make_view('pages.welcome');
    }
}
