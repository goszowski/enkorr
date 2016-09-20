<?php
/* test2 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Route;
use App\Runsite\Classes;
use App\Runsite\Nodes;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use App\Runsite\Languages;

class RunsiteController extends Controller {

  public $currentNode;
  public $currentClass;
  public $currentFields;

  public function __construct() {
    // $this->currentNode = PH::getGlobal('RunsiteNode') or abort(404); //$GLOBALS['RunsiteNode'];
    // $this->currentClass = Classes::find($this->currentNode->class_id) or abort(404);
    // $this->currentFields = Node::get($this->currentClass->shortname, $this->currentNode->id) or abort(404);
    //
    // if(!$this->currentFields->is_active)
    //   return abort(404);

    $this->currentNode = PH::getGlobal('RunsiteNode') or abort(404);
    $this->currentClass = Classes::find($this->currentNode->class_id) or abort(404);
    $this->currentFields = Model($this->currentClass->shortname)->where('node_id', $this->currentNode->id)->first();

    if(!isset($this->currentFields->is_active) or !$this->currentFields->is_active)
      return abort(404);
  }

  public function getSimpleList()
  {
    return $this->currentNode;
  }

  public function children($class_name, $where_add=false, $order=false, $paginate=false, $lang_id=false) {
    return Node::getList($class_name, $this->currentNode->id, $where_add, $order, $paginate, $lang_id);
  }

  public function make_view($view, $params=false) {
    $p = [
      'currentNode'     => $this->currentNode,
      'currentFields'   => $this->currentFields,
      'node'     => $this->currentNode,
      'fields'   => $this->currentFields,
      'class'    => $this->currentClass,
    ];

    if($params) {
      $p = array_merge($p, $params);
    }
    return view($view, $p);
  }
}
