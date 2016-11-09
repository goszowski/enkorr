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

class AuthComponent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $class = Classes::create([
        'name' => 'User',
        'name_more' => 'Users',
        'name_create' => 'User',
        'shortname' => 'user',
        'default_controller' => 'UserController@view',
        'limited_users_can_create' => false,
        'limited_users_can_delete' => false,
        'show_in_admin_tree' => false,
        'can_export' => 1,
        'show_count' => true,
      ]);

      $class->createSchema($class->shortname);


      $field = Fields::create([
        'type_id' => 1,
        'class_id' => $class->id,
        'name' => 'User name',
        'shortname' => 'name',
        'required' => true,
        'shown' => true,
        'sort' => 1,
        'ignore_language' => true,
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
        'type_id' => 1,
        'class_id' => $class->id,
        'name' => 'Email',
        'shortname' => 'email',
        'required' => true,
        'shown' => true,
        'sort' => 3,
        'ignore_language' => true,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 1,
        'class_id' => $class->id,
        'name' => 'Password',
        'shortname' => 'password',
        'required' => true,
        'shown' => false,
        'sort' => 4,
        'ignore_language' => true,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $field = Fields::create([
        'type_id' => 1,
        'class_id' => $class->id,
        'name' => 'Reset Token',
        'shortname' => 'reset_token',
        'required' => false,
        'shown' => false,
        'sort' => 5,
        'ignore_language' => true,
      ]);

      $settings = (new Field_settings_default())->prepare($field->type_id);
      (new Field_settings())->store($settings, $field->id, $class->id);
      $field->addSchemaField($class->shortname, $field->shortname, $settings['db_field_type']['_value'], $settings['db_field_size']['_value']);
      unset($field, $settings);

      $adminSection = Classes::where('shortname', 'admin_section')->first();
      if(count($adminSection))
      {
        $activeLocal = PH::getActiveLocalId();
        $authNode = Node::push($adminSection->id, 1, 'auth', [
          $activeLocal => [
            'name' => 'Auth',
          ]
        ]);

        $pageClass = Classes::where('shortname', 'page')->first();
        if(count($pageClass))
        {
          Node_dependencies::create([
            'node_id' => $authNode,
            'subclass_id' => $pageClass->id,
          ]);


          $loginFormId = Node::push($pageClass->id, $authNode, 'login', [
            $activeLocal => [
              'name' => 'Login',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $loginFormId)->update(['controller' => 'UserController@loginForm']);

          $registerFormId = Node::push($pageClass->id, $authNode, 'register', [
            $activeLocal => [
              'name' => 'Register',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $registerFormId)->update(['controller' => 'UserController@registerForm']);

          $resetFormId = Node::push($pageClass->id, $authNode, 'reset', [
            $activeLocal => [
              'name' => 'Reset Password',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $resetFormId)->update(['controller' => 'UserController@resetForm']);

          $signInId = Node::push($pageClass->id, $authNode, 'sign-in', [
            $activeLocal => [
              'name' => 'Sign In',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $signInId)->update(['controller' => 'UserController@signIn']);

          $signUpId = Node::push($pageClass->id, $authNode, 'sign-up', [
            $activeLocal => [
              'name' => 'Sign Up',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $signUpId)->update(['controller' => 'UserController@signUp']);

          $sendResetRequestId = Node::push($pageClass->id, $authNode, 'send-reset-request', [
            $activeLocal => [
              'name' => 'Send Reset Request',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $sendResetRequestId)->update(['controller' => 'UserController@sendResetRequest']);

          $resetPasswordId = Node::push($pageClass->id, $authNode, 'reset-password', [
            $activeLocal => [
              'name' => 'Reset Password',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $resetPasswordId)->update(['controller' => 'UserController@resetPassword']);

          $resetPasswordId = Node::push($pageClass->id, $authNode, 'reset-action', [
            $activeLocal => [
              'name' => 'Reset Password',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $resetPasswordId)->update(['controller' => 'UserController@resetPasswordAction']);

          $updateId = Node::push($pageClass->id, $authNode, 'update', [
            $activeLocal => [
              'name' => 'Update',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $updateId)->update(['controller' => 'UserController@update']);

          $logOutId = Node::push($pageClass->id, $authNode, 'logout', [
            $activeLocal => [
              'name' => 'Logout',
              'is_active' => true,
            ]
          ]);
          Nodes::where('id', $logOutId)->update(['controller' => 'UserController@logout']);



          $usersId = Node::push($adminSection->id, 1, 'users', [
            $activeLocal => [
              'name' => 'Users',
            ]
          ]);

          Node_dependencies::create([
            'node_id' => $usersId,
            'subclass_id' => $class->id,
          ]);
        }



      }
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
