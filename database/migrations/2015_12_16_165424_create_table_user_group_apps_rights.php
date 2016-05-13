<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserGroupAppsRights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_group_apps_rights', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('group_id');
        $table->integer('app_id');
        $table->integer('rights');
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
        Schema::drop('user_group_apps_rights');
    }
}
