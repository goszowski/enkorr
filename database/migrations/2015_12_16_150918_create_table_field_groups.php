<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFieldGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('field_groups', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('class_id');
        $table->string('name', 255);
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('field_groups');
    }
}
