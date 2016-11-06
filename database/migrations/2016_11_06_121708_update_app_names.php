<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAppNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('apps')->where('execute', 'filemanager')->update(['execute'=>'admin.filemanager']);
        DB::table('apps')->where('execute', 'events.list')->update(['execute'=>'admin.events.list']);
        DB::table('apps')->where('execute', 'panel-admin.users.index')->update(['execute'=>'admin.users.index']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::table('apps')->where('execute', 'admin.filemanager')->update(['execute'=>'filemanager']);
      DB::table('apps')->where('execute', 'admin.events.list')->update(['execute'=>'events.list']);
      DB::table('apps')->where('execute', 'admin.users.index')->update(['execute'=>'panel-admin.users.index']);
    }
}
