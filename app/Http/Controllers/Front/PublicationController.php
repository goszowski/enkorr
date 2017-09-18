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
        return $this->make_view('publications.view');
    }

}
