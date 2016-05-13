<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('name_more', 255);
            $table->string('name_create', 255);
            $table->string('shortname', 255);
            $table->string('default_controller', 255);
            $table->string('nodename_label', 255);
            $table->boolean('access_edit_name');
            $table->boolean('access_edit_shortname');
            $table->boolean('limited_users_can_create');
            $table->boolean('limited_users_can_delete');
            $table->boolean('show_in_admin_tree');
            $table->boolean('cache');
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
        Schema::drop('classes');
    }
}
