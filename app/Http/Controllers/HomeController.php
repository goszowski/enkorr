<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends RunsiteController
{

    public function index()
    {
        return view('pages.home', [
          'currentNode'     => $this->currentNode,
          'currentFields'   => $this->currentFields,
        ]);
    }
}
