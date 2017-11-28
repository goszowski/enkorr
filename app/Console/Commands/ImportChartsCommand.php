<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Import\Price;
use App\Runsite\Libraries\Store;

class ImportChartsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:charts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $items = Price::where('is_published', true)->orderBy('date', 'desc')->get();

        foreach($items as $item)
        {
            $node = (new Store)->node('indicator_value', null, $item->getParentId());
            
            $node->ru->is_active = true;
            $node->ru->fuel_type_id = $item->getTypeId();
            $node->ru->wholesale = $item->fuel_2;
            $node->ru->retail = $item->fuel_1;
            $node->ru->pubdate = $item->date;

            $node->ru->save();
        }
    }
}
