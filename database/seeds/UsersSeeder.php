<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\User;

class UsersSeeder extends Seeder
{

    public function run()
    {
      User::create([
        'name' => 'Ярослав Гошовський',
        'email' => 'goszowski@gmail.com',
        'password' => Hash::make('altertable025'),
      ]);

      User::create([
        'name' => 'Ігор Гошовський',
        'email' => 'pr@runsite.com.ua',
        'password' => Hash::make('09101983zoriana'),
        'is_limited' => true,
      ]);

      User::create([
        'name' => 'Максим Кріщанович',
        'email' => 'tornhold@gmail.com',
        'password' => Hash::make('garoth11'),
      ]);

    }
}
