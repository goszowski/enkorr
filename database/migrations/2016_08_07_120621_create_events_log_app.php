<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsLogApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('event_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->timestamps();
      });

      DB::table('event_types')->insert([
        'name' => 'Create',
      ]);

      DB::table('event_types')->insert([
        'name' => 'Update',
      ]);

      DB::table('event_types')->insert([
        'name' => 'Delete',
      ]);

      DB::table('event_types')->insert([
        'name' => 'Restore',
      ]);

      Schema::create('events', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->references('id')->on('users');
          $table->integer('event_type_id')->references('id')->on('event_types');
          $table->integer('node_id')->references('id')->on('nodes');
          $table->timestamps();
      });

      $id = DB::table('apps')->insertGetId([
          'name' => 'admin/events.app_name',
          'execute' => 'events.list',
      ]);
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
