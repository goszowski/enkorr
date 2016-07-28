<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameApps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('apps')
          ->where('name', 'Типи розділів')
          ->update(['name'=>'admin/classes.app_name']);

        DB::table('apps')
          ->where('name', 'Мовні версії')
          ->update(['name'=>'admin/languages.app_name']);

        DB::table('apps')
          ->where('name', 'Користувачі')
          ->update(['name'=>'admin/users.app_name']);

        DB::table('apps')
          ->where('name', 'Менеджер файлів')
          ->update(['name'=>'admin/filemanager.app_name']);
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
