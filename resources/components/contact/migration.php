<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Runsite\Classes;
use App\Runsite\Fields;
use App\Runsite\Nodes;
use App\Runsite\Field_settings;
use App\Runsite\Field_settings_default;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use App\Runsite\Node_dependencies;

class ContactComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $class = Classes::create([
        'name' => 'Contact',
        'name_more' => 'Contacts',
        'name_create' => 'Contact',
        'shortname' => 'contact',
        'default_controller' => 'ContactController@view',
        'limited_users_can_create' => false,
        'limited_users_can_delete' => false,
        'show_in_admin_tree' => true,
        'can_export' => 0,
        'show_count' => false,
      ]);

      $class->createSchema($class->shortname);


      $field = Fields::create([
        'type_id' => 1,
        'class_id' => $class->id,
        'name' => 'Name',
        'shortname' => 'name',
        'required' => true,
        'shown' => true,
        'sort' => 1,
        'ignore_language' => false,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 7,
        'class_id' => $class->id,
        'name' => 'Is Active',
        'shortname' => 'is_active',
        'required' => false,
        'shown' => true,
        'sort' => 2,
        'ignore_language' => true,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 3,
        'class_id' => $class->id,
        'name' => 'Address',
        'shortname' => 'address',
        'required' => false,
        'shown' => false,
        'sort' => 3,
        'ignore_language' => false,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 3,
        'class_id' => $class->id,
        'name' => 'Phone',
        'shortname' => 'phone',
        'required' => false,
        'shown' => false,
        'sort' => 4,
        'ignore_language' => false,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 3,
        'class_id' => $class->id,
        'name' => 'Email',
        'shortname' => 'email',
        'required' => false,
        'shown' => false,
        'sort' => 5,
        'ignore_language' => false,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $activeLocal = PH::getActiveLocalId();
      $contactNodeId = Node::push($class->id, 1, 'contact', [
        $activeLocal => [
          'name' => 'Contact',
          'is_active' => true,
        ]
      ]);

      $adminSection = Classes::where('shortname', 'admin_section')->first();
      $sendNodeId = Node::push($adminSection->id, $contactNodeId, 'send', [
        $activeLocal => [
          'name' => 'Send request',
          'is_active' => true,
        ]
      ]);

      Nodes::where('id', $sendNodeId)->update(['controller' => 'ContactController@sedRequest']);

      //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
