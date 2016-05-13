<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Runsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runsite:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runsite::CMS instalation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->comment('Welcome to runsite::CMS installer');
      $go = $this->ask('Run instalation? (y/n)');
      if($go == 'y') {
        $this->comment('Instalation...');
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
        $this->comment('Instalation complete');
      }
    }
}
