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
        'name' => 'Типи розділів',
        'execute' => 'admin.classes.items',
      ]);

      Apps::create([
        'name' => 'Мовні версії', // Назва в меню
        'execute' => 'admin.languages.items', // Ім'я роута
      ]);

      Apps::create([
        'name' => 'Користувачі', // Назва в меню
        'execute' => 'panel-admin.users.index', // Ім'я роута
      ]);
    }
}
