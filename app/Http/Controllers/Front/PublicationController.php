<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class PublicationController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Берем все публикации которые относятся к данному разделу и кидаем их в пагинацию
        // Ищем нужные публикации по теме.
        // Есть ли темы соответствующие данному разделу?
        if($this->fields->node_id == config('public.sections.publication'))
          $themes = Model('theme')->where('section_id', '!=', config('public.sections.new'))->get();
        else
          $themes = Model('theme')->where('section_id', '=', $this->fields->node_id)->get();

        // Если да то ищем публикации с данными темами
        $publications = [];
        if(isset($themes))
          $publications = Model('publication')->where(function($query) use($themes) {
            foreach($themes as $theme)
            {
              $query->orWhere('theme_id', '=', $theme->node_id);
            }
          })->where('pubdate', '<=', date('Y-m-d H:i:s'))
            ->orderBy('pubdate', 'desc')
            ->paginate(config('public.pagination.publication'));

        // Если нет, то просто передаем пустой массив- не будет отображатсья в дальнейшем шаблоне. Не очень красивое решение, но работающее.

        // Берем баннеры в зависимости от страницы
        switch ($this->fields->node_id) {
          case config('public.sections.publication'):
            $banners['up'] = Model('banner')->where('publ_bool', true)->where('up', true)->inRandomOrder()->first();
            $banners['right'] = Model('banner')->where('publ_bool', true)->where('right', true)->inRandomOrder()->first();
            $banners['down'] = Model('banner')->where('publ_bool', true)->where('down', true)->inRandomOrder()->first();
            break;
          case config('public.sections.new'):
            $banners['up'] = Model('banner')->where('news_bool', true)->where('up', true)->inRandomOrder()->first();
            $banners['right'] = Model('banner')->where('news_bool', true)->where('right', true)->inRandomOrder()->first();
            $banners['down'] = Model('banner')->where('news_bool', true)->where('down', true)->inRandomOrder()->first();
            break;
          case config('public.sections.experts'):
            $banners['up'] = Model('banner')->where('experts_bool', true)->where('up', true)->inRandomOrder()->first();
            $banners['right'] = Model('banner')->where('experts_bool', true)->where('right', true)->inRandomOrder()->first();
            $banners['down'] = Model('banner')->where('experts_bool', true)->where('down', true)->inRandomOrder()->first();
            break;
          default:
            $banners['up'] = [];
            $banners['right'] = [];
            $banners['down'] = [];
            break;
        }

        return $this->make_view('publications.index', compact('publications', 'banners'));
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
      Model('publication')
        ->where('node_id', $this->fields->node_id)
        ->first()
        ->increment('popular');
      $tag_ids = explode(',', $this->fields->tag_ids);
      $tags = Model('tag')->whereIn('node_id', $tag_ids)->get();
      $random_tag = Model('tag')->whereIn('node_id', $tag_ids)->inRandomOrder()->first();

      $comments= Model('comment')->where('parent_id', '=', $this->fields->node_id)->latest()->get();
      foreach($comments as $k =>$comment)
      {
        $comments[$k]['user_name'] = Model('user')->where('node_id', $comment->user_id)->first()->name;
      }


      // Поиск подобных новостей
      if( ($similar_array = explode(',', $this->fields->similar_publications) and count($similar_array)) or count($tags))
      {
        $similar_publications = Model('publication')
                                  ->whereIn('node_id', $similar_array)
                                  ->where('node_id', '!=', $this->fields->node_id)
                                  ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                                  ->orderBy('pubdate', 'desc')
                                  ->limit(3)
                                  ->get();

        $similar_publications_auto = Model('publication')
                                      ->where('tag_ids', 'Like', '%'.$random_tag->node_id.'%')
                                      ->where('node_id', '!=', $this->fields->node_id)
                                      ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                                      ->orderBy('pubdate', 'desc')
                                      ->limit(3-count($similar_publications))
                                      ->get();


        foreach ($similar_publications as $key => $publication)
        {
          $similar_publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
        }

        foreach ($similar_publications_auto as $key => $publication)
        {
          $similar_publications_auto[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
        }
      }
      else
      {
        $similar_publications = [];
        $similar_publications_auto = [];
      }


      //Авторы статьи
      if($authors_array = explode(',', $this->fields->author_ids) and count($authors_array))
      {
        // $authors_array = explode(',', $this->fields->author_ids);
        $authors = Model('author')->whereIn('node_id', $authors_array)->get();
      }
      else
        $authors = [];


      // Выборка для списка справа
      $latest_news = Model('publication')
                      ->where('theme_id', '=', config('public.theme.news'))
                      ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                      ->orderBy('pubdate', 'desc')
                      ->limit(5)
                      ->get();

      $popular_publications = Model('publication')
                                ->where('theme_id', '!=', config('public.theme.news'))
                                ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                                ->orderBy('popular', 'desc')
                                ->limit(5)
                                ->orderBy('pubdate', 'desc')
                                ->get();

      //Баннеры страницы

      if($this->fields->theme_id == config('public.theme.news'))
      {
        $banners['up'] = Model('banner')->where('in_new_bool', true)->where('up', true)->inRandomOrder()->first();
        $banners['right'] = Model('banner')->where('in_new_bool', true)->where('right', true)->inRandomOrder()->first();
        $banners['down'] = Model('banner')->where('in_new_bool', true)->where('down', true)->inRandomOrder()->first();
      }
      else
      {
        $banners['up'] = Model('banner')->where('in_publ_bool', true)->where('up', true)->inRandomOrder()->first();
        $banners['right'] = Model('banner')->where('in_publ_bool', true)->where('right', true)->inRandomOrder()->first();
        $banners['down'] = Model('banner')->where('in_publ_bool', true)->where('down', true)->inRandomOrder()->first();
      }

      return $this->make_view('publications.view', compact('comments', 'tags', 'similar_publications', 'similar_publications_auto', 'latest_news', 'popular_publications', 'banners', 'authors'));
    }

}
