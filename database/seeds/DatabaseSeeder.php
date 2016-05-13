<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(FieldTypeSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(NodesSeeder::class);
        $this->call(AppsSeeder::class);
        $this->call(UsersSeeder::class);

        Model::reguard();
    }
}
