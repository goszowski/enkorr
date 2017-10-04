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

      $publications_model = Model('main_pub')
                              ->orderBy('orderby', 'asc')
                              ->limit(config('public.index.countpub'))
                              ->get();
      if(count($publications_model))
        foreach ($publications_model as $key => $publication)
        {
          $publications[$key] = Model('publication')
                                  ->where('node_id', $publication->pub_id)
                                  ->first();
        }
      else
        $publications = [];
      foreach ($publications as $key => $publication) {
        $publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
      }

      //Баннеры
      $banners['up'] = Model('banner')->where('main_bool', true)->where('up', true)->inRandomOrder()->first();
      $banners['right'] = Model('banner')->where('main_bool', true)->where('right', true)->inRandomOrder()->first();
      $banners['down'] = Model('banner')->where('main_bool', true)->where('down', true)->inRandomOrder()->first();


      //Опрос
      $quiz = Model('quiz')->latest()->first();
      $answers = Model('answer_option')->where('parent_id', $quiz->node_id)->get();
      // Возвращаем нашу функцию и передаем в шаблон взятые данные


      return $this->make_view('pages.index', compact('news', 'publications', 'banners', 'quiz', 'answers'));
    }
}
