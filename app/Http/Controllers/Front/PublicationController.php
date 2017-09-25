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
          $themes = Model('theme')->get();
        else
          $themes = Model('theme')->where('section_id', '=', $this->fields->node_id)->get();

        // Если да то ищем публикации с данными темами
        if(isset($themes))
          $publications = Model('publication')->where(function($query) use($themes) {
            foreach($themes as $theme)
            {
              $query->orWhere('theme_id', '=', $theme->node_id);
            }
          })->latest()->paginate(config('public.pagination.publication'));

        // Если нет, то просто передаем пустой массив- не будет отображатсья в дальнейшем шаблоне. Не очень красивое решение, но работающее.
        else
          $publications = [];

        return $this->make_view('publications.index', compact('publications'));
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
      $tag_ids = explode(',', $this->fields->tag_ids);
      $tags = Model('tag')->whereIn('node_id', $tag_ids);
      $random_tags = $tags->inRandomOrder()->limit(3)->get();
      $tags = $tags->get();

      $comments= Model('comment')->where('parent_id', '=', $this->fields->node_id)->latest()->get();
      foreach($comments as $k =>$comment)
      {
        $comments[$k]['user_name'] = Model('user')->where('node_id', $comment->user_id)->first()->name;
      }

      $similar_publications = [];
      $forbidden_node[0] = [$this->fields->node_id][0];
      foreach ($random_tags as $key => $tag) {
        $similar_publications[$key] = Model('publication')->where('tag_ids', 'Like', '%'.$tag->node_id.'%')->whereNotIn('node_id',$forbidden_node)->latest()->first();
        if(isset($similar_publications[$key]))
        {
          $forbidden_node[$key+1] = $similar_publications[$key]->node_id;
          $similar_publications[$key]['theme'] = Model('theme')->where('node_id', $similar_publications[$key]->theme_id)->first()->name;
        }
      }

      return $this->make_view('publications.view', compact('comments', 'tags', 'similar_publications'));
    }

}
