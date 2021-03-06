<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFieldSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('field_settings', function(Blueprint $table)
      {
        $table->increments('id');
        $table->integer('field_id');
        $table->string('_parameter', 255);
        $table->string('_value', 255);
        $table->string('_info', 255);
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
        Schema::drop('field_settings');
    }
}
