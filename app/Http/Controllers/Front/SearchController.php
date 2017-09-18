<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class SearchController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Берем все новости и кидаем их в пагинацию

        $news = Model('new')->where('name', 'Like', $request->search)->get();
        $publications = Model('publication')->where('name', 'Like', $request->search)->get();


        return $this->make_view('search.index', compact('news', 'publications'));
    }
}
