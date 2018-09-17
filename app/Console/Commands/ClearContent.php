<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Data;

class ClearContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:content';

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
        $publications = ModelNoActive('publication')->take(2000)->withTrashed()->get();
        $this->removeModel($publications);
        unset($publications);

        $news = ModelNoActive('news_item')->take(2000)->withTrashed()->get();
        $this->removeModel($news);
        unset($news);

        $columns = ModelNoActive('column')->take(2000)->withTrashed()->get();
        $this->removeModel($columns);
        unset($columns);

        $interviews = ModelNoActive('interview')->take(2000)->withTrashed()->get();
        $this->removeModel($interviews);
        unset($interviews);

        $tags = ModelNoActive('tag')->take(2000)->withTrashed()->get();
        $this->removeModel($tags);
        unset($tags);

        $main_pubs = ModelNoActive('main_pub')->withTrashed()->get();
        $this->removeModel($main_pubs);
        unset($main_pubs);

        $comments = ModelNoActive('comment')->withTrashed()->get();
        $this->removeModel($comments);
        unset($comments);

        $users = ModelNoActive('user')->withTrashed()->get();
        $this->removeModel($users);
        unset($users);

        $answer_options = ModelNoActive('answer_option')->withTrashed()->get();
        $this->removeModel($answer_options);
        unset($answer_options);

        $answers = ModelNoActive('answer')->withTrashed()->get();
        $this->removeModel($answers);
        unset($answers);

        $polls = ModelNoActive('poll')->withTrashed()->get();
        $this->removeModel($polls);
        unset($polls);

        $authors = ModelNoActive('author')->withTrashed()->get();
        $this->removeModel($authors);
        unset($authors);

        $indicator_values = ModelNoActive('indicator_value')->withTrashed()->get();
        $this->removeModel($indicator_values);
        unset($indicator_values);
        
    }

    protected function removeModel($models)
    {
        foreach($models as $model)
        {
            $node = Nodes::find($model->node_id);

            if($node)
            {
                $classes = new Classes;
                $class = $classes->find($node->class_id);
                $data = new Data;

                $data->init($classes->prefix.$class->shortname, []);
                $data->where('node_id', $node->id)->forceDelete();
                $node->forceDelete();
            }
            
        }
    }
}
