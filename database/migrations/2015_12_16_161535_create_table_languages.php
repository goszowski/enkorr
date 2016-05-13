<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('languages', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('locale', 2);
        $table->string('name', 64);
        $table->boolean('is_active');
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
        Schema::drop('languages');
    }
}
