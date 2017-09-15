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

        $news = Model('new')->latest()->paginate(15);


        return $this->make_view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->make_view('news.view');
    }

}
