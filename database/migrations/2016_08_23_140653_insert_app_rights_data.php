<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAppRightsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('app_rights')->insert([
          'app_id' => 1,
          'user_id' => 1,
        ]);

        DB::table('app_rights')->insert([
          'app_id' => 1,
          'user_id' => 3,
        ]);

        DB::table('app_rights')->insert([
          'app_id' => 2,
          'user_id' => 2,
        ]);

        DB::table('app_rights')->insert([
          'app_id' => 2,
          'user_id' => 3,
        ]);

        DB::table('app_rights')->insert([
          'app_id' => 3,
          'user_id' => 1,
        ]);

        DB::table('app_rights')->insert([
          'app_id' => 3,
          'user_id' => 3,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::table('app_rights')->where('app_id', 1)->delete();
      DB::table('app_rights')->where('app_id', 2)->delete();
      DB::table('app_rights')->where('app_id', 3)->delete();
    }
}
