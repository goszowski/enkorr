<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserGroupNodesRights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_group_nodes_rights', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('group_id');
        $table->integer('node_id');
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
        Schema::drop('user_group_nodes_rights');
    }
}
