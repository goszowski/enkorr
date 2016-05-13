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
        'name' => 'Runsite Developer',
        'email' => 'goszowski@gmail.com',
        'password' => Hash::make('altertable025'),
      ]);

    }
}
