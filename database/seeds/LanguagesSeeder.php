<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use App\Runsite\Languages;

class LanguagesSeeder extends Seeder
{

    public function run()
    {
      $node = Languages::create([
        'locale'          => 'uk',
        'name'            => 'Українська',
        'is_active'       => true,
        'is_default'      => true,
      ]);


      $node = Languages::create([
        'locale'          => 'en',
        'name'            => 'English',
        'is_active'       => true,
        'is_default'      => false,
      ]);

    }
}
