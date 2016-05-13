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
    $this->currentNode = PH::getGlobal('RunsiteNode'); //$GLOBALS['RunsiteNode'];
    $this->currentClass = Classes::find($this->currentNode->class_id);
    $this->currentFields = Node::get($this->currentClass->shortname, $this->currentNode->id);
  }

  public function getSimpleList()
  {
    return $this->currentNode;
  }

  public function children($class_name, $where_add=false, $order=false, $paginate=false, $lang_id=false) {
    return Node::getList($class_name, $this->currentNode->id, $where_add, $order, $paginate, $lang_id);
  }

  public function view($view, $params=false) {
    $p = [
      'currentNode'     => $this->currentNode,
      'currentFields'   => $this->currentFields,
    ];

    if($params) {
      $p = array_merge($p, $params);
    }
    return view($view, $p);
  }
}
