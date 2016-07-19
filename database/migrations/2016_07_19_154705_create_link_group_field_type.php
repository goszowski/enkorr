<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkGroupFieldType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $date = date('Y-m-d H:i:s');

      $id = DB::table('field_types')->insertGetId([
          'name' => 'Link Group',
          'input_controller' => 'link_group',
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
          '_value' => '256',
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
          '_value' => 'check_vertical',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'check_vertical',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_html_control_types')->insert([
          'type_id' => $id,
          'type_variant' => 'check_columns',
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
        //
    }
}
