<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class NewsController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Берем все новости и кидаем их в пагинацию

        $news = Model('new')->where('pubdate', '<=', date('Y-m-d H;i;s'))->orderBy('pubdate', 'desc')->paginate(config('public.pagination.news'));


        return $this->make_view('news.index', compact('news'));
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
        $similar_publications[$key] = Model('new')->where('tag_ids', 'Like', '%,'.$tag->node_id.'%')->whereNotIn('node_id',$forbidden_node)->where('pubdate', '<=', date('Y-m-d H;i;s'))->orderBy('pubdate', 'desc')->first();
        if(isset($similar_publications[$key]))
        {
          $forbidden_node[$key+1] = $similar_publications[$key]->node_id;
        }
      }


      return $this->make_view('publications.view', compact('comments', 'tags', 'similar_publications'));
    }

}
