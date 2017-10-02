<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;

class QuizController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $quizes = Model('quiz')->orderBy('node_id', 'desc')->paginate();
        return $this->make_view('quizes.index', compact('quizes'));
    }

    public function view()
    {
        $answer_options = Model('answer_option')->where('parent_id', $this->fields->node_id)->get();

        if(Model('answer')->where('parent_id', $this->fields->node_id)->where('name', \Request::ip())->count())
        {
          $answer = true;
          if(count($answer_options))
          {
            foreach ($answer_options as $key => $answer_option) {
              $answer_options[$key]['answer_count'] = Model('answer')->where('link', $answer_option->node_id)->count();
            }
          }
        }
        else
        {
          $answer = false;
        }
        return $this->make_view('quizes.view');
    }
}
