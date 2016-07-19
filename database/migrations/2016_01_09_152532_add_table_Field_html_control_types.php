<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableFieldHtmlControlTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('field_html_control_types', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('type_id');
        $table->string('type_variant');
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
      });


      $date = date('Y-m-d H:i:s');
      
      $id = DB::table('field_types')->insertGetId([
          'name' => 'String',
          'input_controller' => 'string',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

          // DEFAULT SETTINGS
          DB::table('field_settings_default')->insert([
              'type_id' => $id,
              '_parameter' => 'db_field_type',
              '_value' => 'string',
              'created_at' => $date,
              'updated_at' => $date,
              'control' => 'string',
          ]);

          DB::table('field_settings_default')->insert([
              'type_id' => $id,
              '_parameter' => 'db_field_size',
              '_value' => '255',
              'created_at' => $date,
              'updated_at' => $date,
              'control' => 'string',
          ]);

          DB::table('field_settings_default')->insert([
              'type_id' => $id,
              '_parameter' => 'type_of_html_control',
              '_value' => 'normal',
              'created_at' => $date,
              'updated_at' => $date,
              'control' => 'select',
          ]);

          // HTML CONTROLS
          DB::table('field_html_control_types')->insert([
              'type_id' => $id,
              'type_variant' => 'normal',
              'created_at' => $date,
              'updated_at' => $date,
          ]);

          DB::table('field_html_control_types')->insert([
              'type_id' => $id,
              'type_variant' => 'readonly',
              'created_at' => $date,
              'updated_at' => $date,
          ]);

      // -- -- --




      // integer
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Integer',
          'input_controller' => 'integer',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'integer',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      // -- -- --

      // textarea
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Textarea',
          'input_controller' => 'textarea',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'string',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '1024',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);


      // ckeditor
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Ckeditor',
          'input_controller' => 'ckeditor',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'text',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'require_css_file',
          '_value' => '',
          '_info' => 'Must contains in public folder. Template: css/style.css',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'runsite',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'runsite',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'basic',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'standard',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'full',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);




      // link
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Link',
          'input_controller' => 'link',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'integer',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'linked_class',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'parent_id',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'integer',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'select_with_search',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'radio_vertical',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'radio_inline',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'radio_groups',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'select',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'select_with_search',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'autocomplite',
          'created_at' => $date,
          'updated_at' => $date,
      ]);


      // image
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Image',
          'input_controller' => 'image',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'string',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '512',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'image_sizes',
          '_value' => '1300/600/150',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'dropzone',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);



      // bool
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Boolean',
          'input_controller' => 'boolean',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'boolean',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '2',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);


      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'switch',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);


      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'radio',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'checkbox',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'switch',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);


      // datetime
      $id = DB::table('field_types')->insertGetId([
          'name' => 'Datetime',
          'input_controller' => 'datetime',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'datetime',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'string',
      ]);



      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'datetime',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      // HTML CONTROLS
      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'datetime',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'readonly',
          'created_at' => $date,
          'updated_at' => $date,
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('field_html_control_types');
    }
}
