<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nodes', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('parent_id');
        $table->integer('class_id');
        $table->integer('subtree_order');
        $table->string('shortname', 512);
        $table->string('absolute_path', 512);
        $table->string('controller', 255);
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
        Schema::drop('nodes');
    }
}
