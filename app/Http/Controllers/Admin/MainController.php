<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Apps;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Libraries\Locale;
use Response;
use Request;

class MainController extends Controller {

  public function execute() {
    $auth_user = \Auth::user();
    if($auth_user->is_limited) {
      $_APPS = Apps::where('limited_access', true)->get();
    }
    else {
      $_APPS = Apps::get();
    }
    return view('admin.main')
            ->withApps($_APPS);
  }

  public function tree() {
    $parent_id = Request::input('parent_id') or $parent_id = 0;
    if($parent_id == '#') $parent_id = 0;

    $classesToShow = Classes::where('show_in_admin_tree', true)->get();

    $out = false;
    $items = Nodes::where('parent_id', $parent_id)->whereIn('class_id', $classesToShow->lists('id'))->skip(0)->take(30)->get();
    if(! $parent_id) {
      foreach($items as $k=>$item) {
        $items[$k]['children'] = Nodes::where('parent_id', $item->id)->whereIn('class_id', $classesToShow->lists('id'))->get();
      }
    }

    foreach($items as $item) {
      $out[] = $item;
    }

    //$childrenCount = Nodes::where('parent_id', $parent_id)->count();

    return view('admin.tree')
            ->withItems($out)
            ->withParent($parent_id)
            ->with('classesToShow', $classesToShow);
  }

}
