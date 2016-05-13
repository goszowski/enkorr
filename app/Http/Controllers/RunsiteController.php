<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Route;
use App\Runsite\Classes;
use App\Runsite\Nodes;
use App\Runsite\Libraries\Node;
use App\Runsite\Languages;

class RunsiteController extends Controller {

  public $currentNode;
  public $currentClass;
  public $currentFields;

  public function __construct() {
    $this->currentNode = $GLOBALS['RunsiteNode'];
    $this->currentClass = Classes::find($this->currentNode->class_id);
    $this->currentFields = Node::get($this->currentClass->shortname, $this->currentNode->id);
  }

  public function getSimpleList()
  {
    return $this->currentNode;
  }
}
