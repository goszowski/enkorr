<?php

/* test */

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;

class PageController extends RunsiteController
{

    public function index()
    {
        return $this->make_view('pages.home', [
          'currentNode'     => $this->currentNode,
          'currentFields'   => $this->currentFields,
        ]);
    }
}
