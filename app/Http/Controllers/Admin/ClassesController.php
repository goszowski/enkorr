<?php

/**
 * Runsite.Development
 * All rights reserved
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Runsite\Classes;
use App\Runsite\Fields;
use App\Runsite\Field_settings;
use App\Runsite\Field_groups;
use App\Runsite\Nodes;
use App\Runsite\Languages;

use App\Runsite\Libraries\Node;

class ClassesController extends Controller {

  protected $pagination_limit = 20;
  protected $storeRules = [
    'name'                  => 'required|max:255|string',
    'shortname'             => 'required|unique:classes|max:255|alpha_dash',
    'default_controller'    => 'max:255',
    'can_export'            => 'integer',
  ];

  protected $updateRules = [
    'id'                    => 'required|integer|exists:classes,id',
    'name'                  => 'required|max:255|string',
    'shortname'             => 'required|max:255|alpha_dash',
    'default_controller'    => 'max:255',
    'can_export'            => 'integer',
  ];

  protected $removeRules = [
    'id'                    => 'required|integer|exists:classes,id',
  ];

  protected $searchRules = [
    'search'                => 'string|max:255',
  ];



  /**
   * show creating form
   * @return void
   */
  public function create(Node $node) {
    // $f = [
    //   10 => [
    //     'name' => 'The name of lang 10',
    //     'title' => 'Title text',
    //     'keywords' => 'K text',
    //   ],
    //
    //   11 => [
    //     'name' => 'The name of lang 11',
    //     'title' => 'Title text 11',
    //     'keywords' => 'K text 11',
    //   ]
    // ];
    //
    // $node::push(39,2,NULL, $f);

    //$nodesModel->insert('page', 0, $f, $classesModel, $languagesModel);
    return view('admin.classes.create');
  }



  /**
   * show editing form
   * @param  [type]  $id      [description]
   * @param  Classes $classes [description]
   * @return void
   */
  public function edit($id, Classes $classes) {
    $class = $classes->find((int) $id);
    if($class) {
      return view('admin.classes.edit')->withClass($class);
    }
    else {
      abort(404);
    }
  }


  /**
   * listing items
   * @param  Classes $classes [description]
   * @return void
   */
  public function items(Classes $classes, Request $request, Validator $validator) {

    // validation search request
    if($v = $validator::make($request->all(), $this->searchRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    // getting search keys
    $search = $request->input('search');

    // getting items
    $query = $classes->orderBy('created_at', 'desc');

    if(!empty($search)) {
      $query->where('name', 'like', '%'.$search.'%');
    }

    $items = $query->paginate($this->pagination_limit);

    // return listing view
    return view('admin.classes.items')->withClasses($items);
  }


  /**
   * showing confirmation form before removing
   * @param  int  $id         [class id]
   * @param  Classes $classes [description]
   * @return void
   */
  public function remove_confirmation($id, Classes $classes) {

    // getting class
    $class = $classes
              ->find((int) $id);
    return view('admin.classes.remove')->withClass($class);
  }




  /**
   * inserting class and create schema
   * @param  Request   $request   [description]
   * @param  Classes   $classes   [description]
   * @param  Validator $validator [description]
   * @return void
   */
  public function store(Request $request, Classes $classes, Validator $validator) {

    // validation request
    if($v = $validator::make($request->all(), $this->storeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    // store data
    $classes
      ->setValues($request)
      ->save();

    // creating schema
    $classes->createSchema($classes->shortname);

    // return edit view
    return \Redirect::route('admin.classes.edit', ['id'=>$classes->id]);
  }




  /**
   * updating class
   * @param  Request   $request   [description]
   * @param  Classes   $classes   [description]
   * @param  Validator $validator [description]
   * @return void
   */
  public function update(Request $request, Classes $classes, Validator $validator) {

    // validation request
    if($v = $validator::make($request->all(), $this->updateRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    // gettings class
    $class = $classes->find((int) $request->id);

    // updating data
    $class
      ->setValues($request)
      ->save();

    if($class->shortname != $request->input('old_shortname')) {
      // rename schema
      $class->renameSchema($request->input('old_shortname'), $class->shortname);
    }

    // saving success message
    \Session::flash('success','Successfully saved');

    // return edit view
    return \Redirect::route('admin.classes.edit', ['id'=>$class->id]);
  }




  /**
   * removing class and schema
   * @param  Request   $request   [description]
   * @param  Classes   $classes   [description]
   * @param  Validator $validator [description]
   * @return void
   */
  public function remove(Request $request, Classes $classes, Validator $validator, Fields $fields, Field_settings $field_settings, Field_groups $groups) {

    // validation request
    if($v = $validator::make($request->all(), $this->removeRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $class = $classes->find((int) $request->id);
    $classes->removeSchema($class->shortname);
    $fields->where('class_id', $class->id)->delete();
    $field_settings->where('class_id', $class->id)->delete();
    $groups->where('class_id', $class->id)->delete();
    $class->delete();

    return \Redirect::route('admin.classes.items');

  }


}
