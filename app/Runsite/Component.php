<?php
namespace App\Runsite;

use App\Runsite\Classes;
use App\Runsite\Fields;
use App\Runsite\Field_types;
use App\Runsite\Field_settings_default;
use App\Runsite\Field_settings;
use App\Runsite\Nodes;
use App\Runsite\Libraries\PH;

class Component
{

    public static function makeModel($modelData, $fields)
    {
      // створення порожньої моделі
      $model = Classes::create([
        'name'                        => $modelData['name'],
        'name_more'                   => $modelData['name_more'],
        'name_create'                 => $modelData['name_create'],
        'shortname'                   => $modelData['shortname'],
        'default_controller'          => $modelData['default_controller'],
        'limited_users_can_create'    => $modelData['limited_users_can_create'],
        'limited_users_can_delete'    => $modelData['limited_users_can_delete'],
        'show_in_admin_tree'          => $modelData['show_in_admin_tree'],
        'can_export'                  => $modelData['can_export'],
        'show_count'                  => $modelData['show_count'],
      ]);

      // створення таблиці в базі
      $model->createSchema($model->shortname);

      if(count($fields))
      {
        foreach($fields as $k=>$field)
        {
          $fieldModel = Fields::create([
            'type_id' => Field_types::where('input_controller', $field['type'])->first()->id,
            'class_id' => $model->id,
            'name' => $field['name'],
            'shortname' => $field['shortname'],
            'required' => $field['required'],
            'shown' => $field['shown'],
            'sort' => (++$k),
            'ignore_language' => $field['ignore_language'],
          ]);

          $settings = (new Field_settings_default())->prepare($fieldModel->type_id);
          (new Field_settings())->store($settings, $fieldModel->id, $model->id);
          $fieldModel->addSchemaField($model->shortname, $fieldModel->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
          unset($fieldModel, $settings);
        }
      }

      return $model;

    }


    public static function makeNode($class_id, $parent_id, $shortname, $controller=false, $fields)
    {
      $activeLocal = PH::getActiveLocalId();

      $node_id = Node::push($class_id, $parent_id, $shortname, [
        $activeLocal => $fields,
      ]);

      if($controller)
      {
        Nodes::where('id', $sendNodeId)->update(['controller' => 'ContactController@sedRequest']);
      }


      return $node_id;
    }
}
