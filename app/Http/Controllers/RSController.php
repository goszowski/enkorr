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

class RSController extends Controller {

  public $node;
  public $fields;

  public function __construct() {

    $this->node   = new \stdClass;
    $this->fields = new \stdClass;

    if(PH::getGlobal('RunsiteNode'))
    {
      $this->node = PH::getGlobal('RunsiteNode');
      $model = Classes::find($this->node->class_id) or abort(404);
      $this->fields = ModelNoActive($model->shortname)->where('node_id', $this->node->id)->first();

      if((!isset($this->fields->is_active) or !$this->fields->is_active) and !request('preview'))
        return abort(404);
    }


  }

  public function children($modelName)
  {
      return Model($modelName)->where('parent_id', $this->node->id);
  }

  public function make_view($view, $params=false)
  {
    $p = [
      'node'     => $this->node,
      'fields'   => $this->fields,
    ];

    if($params) {
      $p = array_merge($p, $params);
    }
    return view($view, $p);
  }
}
