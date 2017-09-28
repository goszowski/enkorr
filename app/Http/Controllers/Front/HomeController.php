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
                        ->where('theme_id', '=', config('public.theme.news'))
                        ->where('pubdate', '<=', date('Y-m-d H;i;s'))
                        ->orderBy('pubdate', 'desc')
                        ->limit(config('public.index.countnews'))
                        ->get();

      $publications = Model('publication')
                        ->where('theme_id', '!=', config('public.theme.news'))
                        ->where('pinned', false)
                        ->where('pubdate', '<=', date('Y-m-d H;i;s'))
                        ->orderBy('pubdate', 'desc')
                        ->limit(config('public.index.countpub'))
                        ->get();

      $pinned_publications = Model('publication')
                        ->where('theme_id', '!=', config('public.theme.news'))
                        ->where('pinned', true)->where('pubdate', '<=', date('Y-m-d H;i;s'))
                        ->orderBy('pubdate', 'desc')
                        ->limit(config('public.index.countspecialpub'))
                        ->get();

      foreach ($publications as $key => $publication) {
        $publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
      }

      foreach ($pinned_publications as $key => $publication) {
        $pinned_publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
      }
      $banners = Model('banner')->where('main_bool', '=', 'true')->get();


      // Возвращаем нашу функцию и передаем в шаблон взятые данные


      return $this->make_view('pages.index', compact('news', 'publications', 'pinned_publications', 'banners'));
    }
}
