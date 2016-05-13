<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Fields;
use App\Runsite\Classes;
use App\Runsite\Field_types;
use App\Runsite\Field_groups;
use App\Runsite\Field_settings;
use App\Runsite\Field_settings_default;
use Illuminate\Http\Request;
use Validator;

class GroupsController extends Controller {

  protected $storeRules = [
    'name'      => 'required|max:255',
    'class_id'  => 'required|integer|exists:classes,id'
  ];

  protected $updateRules = [
    'id'        => 'required|integer|exists:field_groups,id',
    'name'      => 'required|max:255',
    'class_id'  => 'required|integer|exists:classes,id'
  ];

  protected $removeRules = [
    'id'        => 'required|integer|exists:field_groups,id',
  ];

  public function items($class_id, Field_groups $groups, Classes $classes) {
    $items = $groups->where('class_id', $class_id)->get();
    $class = $classes->find($class_id);
    return view('admin.groups.items')->withItems($items)->withClass($class);
  }

  public function create($class_id, Classes $classes) {
    $class = $classes->find($class_id);
    return view('admin.groups.create')->withClass($class);
  }

  public function edit($class_id, $group_id, Field_groups $groups, Classes $classes) {
    $group = $groups->find($group_id);
    $class = $classes->find($class_id);
    if(!$group or !$class or $class->id != $group->class_id) {
      return abort(404);
    }

    return view('admin.groups.edit')
            ->withGroup($group)
            ->withClass($class);
  }

  public function remove_confirmation($class_id, $group_id, Field_groups $groups, Classes $classes) {
    // getting class
    $group = $groups->find((int) $group_id);
    if(!$group) {
      return abort(404);
    }
    $class = $classes->find($group->class_id);
    return view('admin.groups.remove')->withGroup($group)->withClass($class);
  }

  public function store($class_id, Request $request, Validator $validator, Field_groups $groups) {
    // validation request
    if($v = $validator::make($request->all(), $this->storeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $groups->name = $request->name;
    $groups->class_id = $request->class_id;
    $groups->save();

    return \Redirect::route('admin.groups.items', ['class_id'=>$class_id]);
  }

  public function update($class_id, Request $request, Validator $validator, Field_groups $groups) {
    // validation request
    if($v = $validator::make($request->all(), $this->updateRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $group = $groups->find($request->id);
    $group->name = $request->name;
    $group->class_id = $request->class_id;
    $group->save();

    // saving success message
    \Session::flash('success','Successfully saved');

    // return edit view
    return \Redirect::route('admin.groups.edit', ['class_id'=>$class_id, 'group_id'=>$group->id]);
  }

  public function remove(Request $request, Validator $validator, Field_groups $groups, Fields $fields) {
    // validation request
    if($v = $validator::make($request->all(), $this->removeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $group = $groups->find((int) $request->id);
    $fields->where('group_id', $group->id)
           ->where('class_id', $request->class_id)
           ->update(['group_id' => 0]);

    $group->delete();

    return \Redirect::route('admin.groups.items', ['class_id'=>$request->class_id]);

  }
}
