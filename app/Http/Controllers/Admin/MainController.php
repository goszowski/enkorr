<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Apps;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Libraries\Locale;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use Response;
use Request;

class MainController extends Controller {

  protected $classesToShow = false;

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

  public function getTreeItems($parent_id) {

    $out = false;

    if(count($this->classesToShow)) {
      foreach($this->classesToShow as $el) {
        $items = Node::getUniversal($el->shortname)
          ->where('language_id', PH::getActiveLocalId())
          ->where('parent_id', $parent_id)
          ->orderBy('orderby', 'asc')
          ->take(30)
          ->get();


        if(count($items)) {
          foreach($items as $item) {
            $out[] = $item;
          }
        }
      }
    }

    return $out;
  }

  public function tree() {
    $parent_id = Request::input('parent_id') or $parent_id = 0;
    if($parent_id == '#') $parent_id = 0;

    if(!$this->classesToShow) {
      $this->classesToShow = Classes::where('show_in_admin_tree', true)->get();
    }

    $out = $this->getTreeItems($parent_id);
    // $items = Nodes::where('parent_id', $parent_id)->whereIn('class_id', $classesToShow->lists('id'))->take(30)->get();

    if($parent_id == 0 and count($out)) {
      $out[0]['children'] = $this->getTreeItems($out[0]->node_id);
    }
    //$childrenCount = Nodes::where('parent_id', $parent_id)->count();

    return view('admin.tree')
            ->withItems($out)
            ->withParent($parent_id)
            ->with('classesToShow', $this->classesToShow);
  }

}
