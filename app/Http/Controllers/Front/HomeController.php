<?php

/* test */

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;

class HomeController extends RSController
{

    public function index()
    {
      // Берем модели новостей в необходимом количестве, берем модели мнений так же в необходимом количестве,
      // и берем все "рекламные банеры" которые приписаны данной странице index..


      $news = Model('publication')
                        ->where('parent_id', config('public.sections.news'))
                        ->where('pubdate', '<=', date('Y-m-d H;i;s'))
                        ->orderBy('pubdate', 'desc')
                        ->limit(config('public.index.countnews'))
                        ->get();

      $first_news_item = $news->first();

      // $publications_model = Model('main_pub')
      //                         ->orderBy('orderby', 'desc')
      //                         ->limit(config('public.index.countpub'))
      //                         ->get();
      // if(count($publications_model))
      //   foreach ($publications_model as $key => $publication)
      //   {
      //     $publications[$key] = Model('publication')
      //                             ->where('node_id', $publication->pub_id)
      //                             ->first();
      //   }
      // else
      //   $publications = [];
      // foreach ($publications as $key => $publication) {
      //   $publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
      // }
      
      $homePubs = Model('main_pub')->orderBy('orderby', 'desc')->limit(config('public.index.countpub'))->get();

      //Баннеры
      $banners['up'] = Model('banner')->where('main_bool', true)->where('up', true)->inRandomOrder()->first();
      $banners['right'] = Model('banner')->where('main_bool', true)->where('right', true)->inRandomOrder()->first();
      $banners['down'] = Model('banner')->where('main_bool', true)->where('down', true)->inRandomOrder()->first();


      //Опрос
      $poll = null;
      $poll = Model('poll')->latest()->first();
      if($poll)
      {
        $poll['ipAnswer'] = empty(Model('answer')->where('parent_id', $poll->node_id)->where('name', \Request::ip())->first());
        $answers = Model('answer_option')->where('parent_id', $poll->node_id)->get();
        $answers_count = Model('answer')->where('parent_id', $poll->node_id)->count();
        if(count($answers) and $answers_count)
          foreach ($answers as $key => $answer) {
            $answers[$key]['count'] =  round(Model('answer')->where('parent_id', $poll->node_id)->where('link', $answer->node_id)->count()*100/$answers_count);
          }
        // Возвращаем нашу функцию и передаем в шаблон взятые данные
      }
      


      return $this->make_view('pages.index', compact('news', 'first_news_item', 'homePubs', 'banners', 'poll', 'answers'));
    }
}
