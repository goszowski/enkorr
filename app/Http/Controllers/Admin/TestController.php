<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\RunsiteController;
use App\Runsite\Nodes;

class TestController extends RunsiteController {


  public function run() {
    //dd($aa);
    echo '<pre style="font-size: 12px;">';
    print_r($this->currentNode);
    echo '</pre>';


  }
}
