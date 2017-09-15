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
        // Есть ли тема соответствующая данному разделу?
        $theme = Model('theme')->where('section_id', '=', $this->fields->node_id)->first();

        // Если да то ищем публикации с данной темой
        if(isset($theme))
          $publications = Model('publication')->where('theme_id', '=', $theme->node_id)->latest()->paginate(15);

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
