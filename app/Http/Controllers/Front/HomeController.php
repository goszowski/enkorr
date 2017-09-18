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


      $news = Model('new')->latest()->take(config('public.index.countnews'))->get();
      $publications = Model('publication')->where('pinned', false)->latest()->take(config('public.index.countnews'))->get();
      $pinned_publications = Model('publication')->where('pinned', true)->latest()->take(config('public.inde.countspecialpub'))->get();
      // $banners = Model('banner')->where('', '=', '')->get();


      // Возвращаем нашу функцию и передаем в шаблон взятые данные


      return $this->make_view('pages.index', compact('news', 'publications', 'pinned_publications'));
    }
}
