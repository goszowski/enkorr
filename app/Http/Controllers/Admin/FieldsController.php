<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Fields;
use App\Runsite\Classes;
use App\Runsite\Field_types;
use App\Runsite\Field_groups;
use App\Runsite\Field_settings;
use App\Runsite\Field_settings_default;
use App\Runsite\Field_html_control_types;
use Illuminate\Http\Request;
use Validator;

class FieldsController extends Controller {


  protected function storeRules($class_id) {
    return [
      'name'                  => 'required|max:255',
      'shortname'             => 'required|unique:fields,shortname,NULL,id,class_id,'.$class_id.'|max:255|alpha_dash',
      'type_id'               => 'required|integer|exists:field_types,id',
      'group_id'              => 'integer|exists:field_groups,id',
      'class_id'              => 'integer|exists:classes,id',
    ];
  }

  protected function updateRules($field_id) {
    return [
      'id'                    => 'integer|exists:fields,id',
      'name'                  => 'required|max:255',
      'shortname'             => 'required|unique:fields,shortname,NULL,id,class_id,'.$field_id.'|max:255|alpha_dash',
      'type_id'               => 'required|integer|exists:field_types,id',
      'group_id'              => 'integer|exists:field_groups,id',
      'class_id'              => 'integer|exists:classes,id',
    ];
  }

  protected function updateSettingsRules() {
    return [
      'id'                    => 'required|integer|exists:field_settings,field_id',
    ];
  }

  protected function removeRules() {
    return [
      'id'                    => 'required|integer|exists:field_settings,field_id',
    ];
  }

  protected $moveRules = [
    'class_id'                => 'required|integer|exists:classes,id',
    'field_id'                => 'required|integer|exists:fields,id',
  ];




  public function items($class_id, Fields $fields, Classes $classes) {

    $items = $fields->where('class_id', ((int) $class_id))->with('group')->with('type')->orderBy('sort', 'asc')->get();
    $class = $classes->find( ((int) $class_id));

    return view('admin.fields.items')
              ->withFields($items)
              ->withClass($class);
  }

  // Show create form
  public function create($class_id, Field_types $fieldTypesModel, Classes $classesModel, Field_groups $fieldGroupsModel) {
    $class = $classesModel->find( ((int) $class_id));
    $field_types = $fieldTypesModel->get();
    $field_groups = $fieldGroupsModel->where('class_id', $class->id)->get();

    return view('admin.fields.create')
              ->withClass($class)
              ->withFieldTypes($field_types)
              ->withGroups($field_groups);
  }

  public function edit($class_id, $field_id, Field_types $fieldTypesModel, Fields $fields, Classes $classes, Field_groups $fieldGroupsModel) {
    $class = $classes->find( ((int) $class_id));
    $field = $fields->find((int) $field_id);
    $field_types = $fieldTypesModel->get();
    $field_groups = $fieldGroupsModel->where('class_id', $class->id)->get();
    if($field and $class and $field_types) {
      return view('admin.fields.edit')
                ->withField($field)
                ->withClass($class)
                ->withFieldTypes($field_types)
                ->withGroups($field_groups);
    }
    else {
      abort(404);
    }
  }

  public function settings($class_id, $field_id, Fields $fields, Field_settings $field_settings, Classes $classes, Field_html_control_types $html_control_types) {
    $class = $classes->find( ((int) $class_id));
    $field = $fields->find((int) $field_id);
    $settings = $field_settings->where('field_id', $field_id)->get();
    $html_controls = $html_control_types->where('type_id', $field->type_id)->get();
    return view('admin.fields.settings')
            ->withField($field)
            ->withClass($class)
            ->withSettings($settings)
            ->withControls($html_controls);
  }

  // Store data
  public function store($class_id, Request $request, Validator $validator, Fields $fields, Field_settings $field_settings, Field_settings_default $field_settings_default, Classes $classes) {

    // validation request
    if($v = $validator::make($request->all(), $this->storeRules($class_id)) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    // creating records in db
    $fields->setValues($request)->save();

    // setup default field settings
    $default_settings = $field_settings_default->prepare($fields->type_id);
    $field_settings->store($default_settings, $fields->id, $class_id);


    // adding field to table
    $class = $classes->find((int) $class_id);
    $fields->addSchemaField($class->shortname, $fields->shortname, $default_settings['db_field_type']['_value'], $default_settings['db_field_size']['_value']);

    return \Redirect::route('admin.fields.items', ['class_id'=>$class_id]);
  }


  public function update($class_id, Request $request, Validator $validator, Fields $fields, Field_settings $field_settings, Field_settings_default $field_settings_default, Classes $classes) {

    // validation request
    if($v = $validator::make($request->all(), $this->updateRules($request->input('id'))) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    // getting class of field
    $class = $classes->find($class_id);

    // getting field
    $field = $fields->find((int) $request->id);

    // saving field data
    $field->setValues($request, true)->save();

    // IF HAS NEW SHORTNAME
    if($field->shortname != $request->input('old_shortname')) {
      // renaming schema
      $field->renameSchema($request->input('old_shortname'), $field->shortname, $classes->prefix, $class->shortname);
    }

    // IF HAS NEW TYPE
    if($field->type_id != $request->input('old_type_id')) {
      // clear old settings
      $field_settings->clearSettings($field->id);

      // setup default field settings
      $default_settings = $field_settings_default->prepare($field->type_id);
      $field_settings->store($default_settings, $field->id, $class_id);

      // change field type
      $field->changeSchemaType($classes->prefix, $class->shortname, $field->shortname, $default_settings['db_field_type']['_value'], $default_settings['db_field_size']['_value']);
    }

    // saving success message
    \Session::flash('success','Successfully saved');

    return \Redirect::route('admin.fields.edit', ['class_id'=>$class_id, 'field_id'=>$field->id]);

  }

  public function settings_update($class_id, $field_id, Request $request, Validator $validator, Fields $fields, Field_settings $field_settings, Field_settings_default $field_settings_default, Classes $classes) {
    // validation request
    if($v = $validator::make($request->all(), $this->updateSettingsRules()) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors()); // errors exists
    }

    if($request->settings) {
      foreach($request->settings as $item) {
        // update settings set _value=? where _parameter=?
        if(isset($item['_value'])) {
          $field_settings->where('_parameter', $item['_parameter'])
                         ->where('field_id', $field_id)
                         ->update(['_value' => $item['_value']]);
        }


        if($item['_parameter'] == 'db_field_size' and isset($item['_value']) and $item['_value'] != $request->old_db_field_size) {
          // change column size
          // getting field
          $field = $fields->find((int) $request->id);
          // getting class of field
          $class = $classes->find($class_id);
          $default_settings = $field_settings_default->prepare($field->type_id);
          $field->changeSchemaType($classes->prefix, $class->shortname, $field->shortname, $default_settings['db_field_type']['_value'], $item['_value']);
        }
      }
    }

    // saving success message
    \Session::flash('success','Successfully saved');
    return \Redirect::route('admin.fields.settings', ['class_id'=>$class_id, 'field_id'=>$field_id]);


  }

  public function remove_confirmation($class_id, $field_id, Fields $fields, Classes $classes) {
    // getting field
    $field = $fields->find($field_id);
    $class = $classes->find($class_id);
    return view('admin.fields.remove')
            ->withField($field)
            ->withClass($class);
  }

  public function remove(Request $request, Validator $validator, Fields $fields, Classes $classes, Field_settings $field_settings) {
    // validation request
    if($v = $validator::make($request->all(), $this->removeRules()) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $field = $fields->find((int) $request->id);
    $class = $classes->find($field->class_id);

    // removing field from table
    $field->removeSchema($classes->prefix, $class->shortname, $field->shortname);

    $fields->where('id', $field->id)->delete(); // remove field
    $field_settings->where('field_id', $field->id)->delete(); // remove field settings

    $field->delete();

    return \Redirect::route('admin.fields.items', $class->id);

  }

  public function moveup($class_id, $field_id, Validator $validator, Fields $fields) {
    // validation request
    if($v = $validator::make(['class_id'=>$class_id, 'field_id'=>$field_id], $this->moveRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $field = $fields->where('class_id', $class_id)->where('id', $field_id)->first();
    $field_replaced = $fields->where('class_id', $class_id)->where('sort', '<', $field->sort)->orderBy('sort', 'desc')->first();
    $old_sort = $field->sort;

    $field->sort = $field_replaced->sort;
    $field_replaced->sort = $old_sort;

    $field->save();
    $field_replaced->save();

    return \Redirect::route('admin.fields.items', $class_id);
  }

  public function movedown($class_id, $field_id, Validator $validator, Fields $fields) {
    // validation request
    if($v = $validator::make(['class_id'=>$class_id, 'field_id'=>$field_id], $this->moveRules) and $v->fails()) {
      return redirect()->back()->withInput()->withErrors($v->errors());
    }

    $field = $fields->where('class_id', $class_id)->where('id', $field_id)->first();
    $field_replaced = $fields->where('class_id', $class_id)->where('sort', '>', $field->sort)->orderBy('sort', 'asc')->first();
    $old_sort = $field->sort;

    $field->sort = $field_replaced->sort;
    $field_replaced->sort = $old_sort;

    $field->save();
    $field_replaced->save();

    return \Redirect::route('admin.fields.items', $class_id);
  }








}
