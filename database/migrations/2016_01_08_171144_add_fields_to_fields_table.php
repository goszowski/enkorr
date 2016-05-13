<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('fields', function($table)
      {
        $table->boolean('required')->unsigned();
        $table->boolean('shown')->unsigned();
        $table->integer('sort')->unsigned();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('fields', function($table)
      {
        $table->dropColumn('required');
        $table->dropColumn('shown');
        $table->dropColumn('sort');
      });
    }
}
