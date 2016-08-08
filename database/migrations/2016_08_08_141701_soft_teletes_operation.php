<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoftTeletesOperation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $classes = DB::table('classes')->get();
        if(count($classes)) {
          foreach($classes as $class) {
            Schema::table('_class_'.$class->shortname, function($table) {
              $table->softDeletes();
            });
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
        //
    }
}
