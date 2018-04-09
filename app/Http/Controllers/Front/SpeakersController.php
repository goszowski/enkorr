<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class SpeakersController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404); // you can remove this if you need
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return $this->make_view('___.view');
    }

}
