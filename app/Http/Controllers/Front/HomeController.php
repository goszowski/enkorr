<?php

/* test */

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;

class HomeController extends RSController
{

    public function index()
    {
      return $this->make_view('pages.welcome');
    }
}
