<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceImageFieldsType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('field_settings_default')
            ->where('type_id', 6)
            ->where('_parameter', 'type_of_html_control')
            ->update([
              '_value' => 'dropzone'
            ]);

        $fields = DB::table('fields')
                        ->where('type_id', 6)
                        ->get();

        if(count($fields)) {
          foreach($fields as $field) {
            DB::table('field_settings')
                  ->where('field_id', $field->id)
                  ->where('_parameter', 'type_of_html_control')
                  ->update([
                    '_value' => 'dropzone'
                  ]);
          }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('field_settings_default')
            ->where('type_id', 6)
            ->where('_parameter', 'type_of_html_control')
            ->update([
              '_value' => 'normal'
            ]);

        $fields = DB::table('fields')
                        ->where('type_id', 6)
                        ->get();

        if(count($fields)) {
          foreach($fields as $field) {
            DB::table('field_settings')
                  ->where('field_id', $field->id)
                  ->where('_parameter', 'type_of_html_control')
                  ->update([
                    '_value' => 'normal'
                  ]);
          }
        }
    }
}
