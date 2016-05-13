<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddControlToFieldSettingsDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('field_settings_default', function($table)
      {
        $table->string('control', 64);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('field_settings_default', function($table)
      {
        $table->dropColumn('control');
      });
    }
}
