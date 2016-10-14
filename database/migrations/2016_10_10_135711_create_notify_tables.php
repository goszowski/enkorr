<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notifycations', function (Blueprint $table) {
          $table->increments('id');
          $table->string('message');
          $table->timestamps();
      });

      Schema::create('notifycation_views', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->integer('notification_id');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifycations');
        Schema::drop('notifycation_views');
    }
}
