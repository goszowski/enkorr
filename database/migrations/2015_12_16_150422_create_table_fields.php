<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('fields', function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('type_id');
          $table->integer('class_id');
          $table->integer('group_id');
          $table->string('name', 255);
          $table->string('shortname', 255);
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
        Schema::drop('fields');
    }
}
