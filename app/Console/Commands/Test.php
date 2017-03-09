<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use Store;

class Test extends Command
{

    protected $signature = 'test';

    protected $description = 'Runsite tests';

    public function handle()
    {
        $newNode = Store::node('page', 'Тест');

        $newNode->uk->name = 'Сторінка 2 УКР';
        $newNode->uk->is_active = true;
        $newNode->uk->save();

        $newNode->en->name = 'Page 2 ENG';
        $newNode->en->is_active = true;
        $newNode->en->save();

    }
}
