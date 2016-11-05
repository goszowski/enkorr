<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecimalField extends Migration
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
          'name' => 'Decimal',
          'input_controller' => 'decimal',
          'created_at' => $date,
          'updated_at' => $date,
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_type',
          '_value' => 'decimal',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'decimal',
      ]);

      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'db_field_size',
          '_value' => '5',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'decimal',
      ]);


      DB::table('field_settings_default')->insert([
          'type_id' => $id,
          '_parameter' => 'type_of_html_control',
          '_value' => 'normal',
          'created_at' => $date,
          'updated_at' => $date,
          'control' => 'select',
      ]);

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
