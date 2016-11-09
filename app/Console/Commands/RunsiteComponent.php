<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Storage;

class RunsiteComponent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runsite:component {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing runsite component';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      // $data = Storage::disk('base')->get('resources\components\\'.$this->argument('name').'\migration.php');
      // Storage::disk('base')->put('database\migrations\\'.date('Y_m_d_His').'_'.$this->argument('name').'_component.php', $data);
      // \Artisan::call('migrate');
      // $this->comment('Complete.');
      $name = $this->argument('name');
      $componentsPath = 'resources\components\\';

      if(!is_dir(base_path($componentsPath.$name)) or !file_exists(base_path($componentsPath.$name.'/component.json')))
        $this->error('Component does not exists');

      $component = json_decode(file_get_contents(base_path($componentsPath.$name.'/component.json')));
      if($component->name != $name)
        $this->error('Component name is not match');

      if(count($component->directories))
      {
        foreach($component->directories as $dir)
        {
          if(!is_dir(base_path($dir)))
          {
            mkdir(base_path($dir));
          }
        }
      }


      if(count($component->files))
      {
        foreach($component->files as $source=>$target)
        {
          if(!file_exists(base_path($target)))
          {
            $source = Storage::disk('base')->get($componentsPath.$name.'/'.$source);
            Storage::disk('base')->put($target, $source);
          }
        }
      }

      if(isset($component->migration))
      {
        $data = Storage::disk('base')->get($componentsPath.$name.'/'.$component->migration);
        Storage::disk('base')->put('database\migrations\\'.date('Y_m_d_His').'_'.$name.'_component.php', $data);
        \Artisan::call('migrate');
        $this->comment('Complete.');
      }


    }
}
