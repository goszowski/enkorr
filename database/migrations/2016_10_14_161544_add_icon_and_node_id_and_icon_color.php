<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconAndNodeIdAndIconColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notifycations', function($table) {
        $table->string('icon');
        $table->string('icon_color');
        $table->integer('node_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('notifycations', function($table)
      {
        $table->dropColumn('icon');
        $table->dropColumn('icon_color');
        $table->dropColumn('node_id');
      });
    }
}
