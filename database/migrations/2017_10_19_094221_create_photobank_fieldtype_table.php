<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotobankFieldtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_images', function($table) {
            $table->increments('id');
            $table->string('source');
            $table->string('image');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('gallery_tags', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        Schema::create('gallery_image_tag', function($table) {
            $table->increments('id');
            $table->integer('image_id')->references('id')->on('gallery_images')->unsigned();
            $table->integer('tag_id')->references('id')->on('gallery_tags')->unsigned();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('image_id')->references('id')->on('gallery_images')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('tag_id')->references('id')->on('gallery_tags')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_image_tag', function(Blueprint $table)
        {
            $table->dropForeign(['image_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('gallery_image_tag');
        Schema::dropIfExists('gallery_tags');
        Schema::dropIfExists('gallery_images');
    }
}
