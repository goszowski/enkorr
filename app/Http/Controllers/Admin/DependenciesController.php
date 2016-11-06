<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Fields;
use App\Runsite\Classes;
use App\Runsite\Field_types;
use App\Runsite\Field_groups;
use App\Runsite\Field_settings;
use App\Runsite\Field_settings_default;
use App\Runsite\Class_dependencies;
use Illuminate\Http\Request;
use Validator;

class DependenciesController extends Controller {

  protected function addRules($class_id) {
    return [
      'class_id'    => 'required|integer|exists:classes,id',
      'add_id'    => 'required|integer|exists:classes,id|unique:class_dependencies,subclass_id,NULL,id,class_id,'.$class_id,
    ];
  }

  protected $removeRules = [
    'class_id'    => 'required|integer|exists:classes,id',
    'remove_id'   => 'required|integer|exists:class_dependencies,subclass_id',
  ];



  public function view($class_id, Classes $classes, Class_dependencies $dependencies) {
    $class = $classes->find($class_id);
    $submitted = $dependencies->with('classes')->where('class_id', $class_id)->get();
    $available = $classes->whereNotIn('id', $submitted->pluck('subclass_id'))->orderBy('id', 'desc')->get();

    return view('admin.dependencies.view')
            ->withClass($class)
            ->withAvailable($available)
            ->withSubmitted($submitted);
  }

  public function add($class_id, $add_id, Class_dependencies $dependencies, Validator $validator) {
    // validation request
    if($v = $validator::make(['class_id'=>$class_id, 'add_id'=>$add_id], $this->addRules($class_id)) and $v->fails()) {
      return \Redirect::route('admin.dependencies.view', $class_id); // errors exists
    }

    $dependencies->class_id = $class_id;
    $dependencies->subclass_id = $add_id;
    $dependencies->save();
    return \Redirect::route('admin.dependencies.view', $class_id);
  }

  public function remove($class_id, $remove_id, Class_dependencies $dependencies, Validator $validator) {
    // validation request
    if($v = $validator::make(['class_id'=>$class_id, 'remove_id'=>$remove_id], $this->removeRules) and $v->fails()) {
      return \Redirect::route('admin.dependencies.view', $class_id); // errors exists
    }

    $dependencies->where('class_id', $class_id)->where('subclass_id', $remove_id)->delete();
    return \Redirect::route('admin.dependencies.view', $class_id);
  }
}
