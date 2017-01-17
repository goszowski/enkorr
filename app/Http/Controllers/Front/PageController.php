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
}
