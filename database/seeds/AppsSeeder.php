<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\Apps;

class AppsSeeder extends Seeder
{

    public function run()
    {
      Apps::create([
        'name' => 'admin/classes.app_name',
        'execute' => 'admin.classes.items',
      ]);

      Apps::create([
        'name' => 'admin/languages.app_name', // Назва в меню
        'execute' => 'admin.languages.items', // Ім'я роута
      ]);

      Apps::create([
        'name' => 'admin/users.app_name', // Назва в меню
        'execute' => 'panel-admin.users.index', // Ім'я роута
      ]);
    }
}
