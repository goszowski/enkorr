<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Import\NewsItem;
use App\Runsite\Libraries\Store;

class ImportNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:news';

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
        $news = NewsItem::where('is_published', true)->orderBy('published_at', 'desc')->skip(3000)->take(3000)->get();

        foreach($news as $newsItem)
        {
            if($newsItem->buildParentID())
            {
                $data = $newsItem->buildData();

                $node = (new Store)->node('publication', $data['name'], $newsItem->buildParentID());

                foreach($data as $key=>$val)
                {
                    $node->ru->{$key} = $val;
                }
                
                $node->ru->save();
            }
        }
    }
}
