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

        return $this->make_view('publications.index', compact('publications'));
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
      $tag_ids = explode(',', $this->fields->tag_ids);
      $tags = Model('tag')->whereIn('node_id', $tag_ids)->get();
      $random_tag = Model('tag')->whereIn('node_id', $tag_ids)->inRandomOrder()->first();

      $comments= Model('comment')->where('parent_id', '=', $this->fields->node_id)->latest()->get();
      foreach($comments as $k =>$comment)
      {
        $comments[$k]['user_name'] = Model('user')->where('node_id', $comment->user_id)->first()->name;
      }

      $similar_publications = Model('publication')
                                ->where('tag_ids', 'Like', '%'.$random_tag->node_id.'%')
                                ->where('node_id', '!=', $this->fields->node_id)
                                ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                                ->orderBy('pubdate', 'desc')
                                ->limit(3)
                                ->get();


      foreach ($similar_publications as $key => $publication)
      {
        $similar_publications[$key]['theme'] = Model('theme')->where('node_id', $publication->theme_id)->first()->name;
      }

      return $this->make_view('publications.view', compact('comments', 'tags', 'similar_publications'));
    }

}
