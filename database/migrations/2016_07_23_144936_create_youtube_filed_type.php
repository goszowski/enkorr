<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYoutubeFiledType extends Migration
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
          'name' => 'Youtube Video',
          'input_controller' => 'youtube_video',
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
          '_value' => '64',
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
