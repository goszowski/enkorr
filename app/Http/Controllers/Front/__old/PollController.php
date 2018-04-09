<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use Validator;

class PollController extends RSController
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $polls = Model('poll')->orderBy('node_id', 'desc')->paginate(config('public.pagination.polls'));
        return $this->make_view('polls.index', compact('polls'));
    }

    public function view()
    {
        $answers = Model('answer_option')->where('parent_id', $this->fields->node_id)->get();

        $answers_count = Model('answer')->where('parent_id', $this->fields->node_id)->count();

        if(Model('answer')->where('parent_id', $this->fields->node_id)->where('name', \Request::ip())->count())
        {
          $answer = true;
          if(count($answers))
          {
            foreach ($answers as $key => $answer_option)
            {
              $answers[$key]['count'] = round(Model('answer')->where('parent_id', $this->fields->node_id)->where('link', $answer_option->node_id)->count()*100/$answers_count);
            }
          }
        }
        else
        {
          $answer = false;
        }
        return $this->make_view('polls.view', compact('answers', 'answer'));
    }

    protected $rules = [
      'poll' => 'required|integer|exists:_class_poll,node_id',
      'option' => 'required|integer|exists:_class_answer_option,node_id',
    ];

    protected function ip_rules($poll)
    {
      return [
        'name' => 'required|ip|unique:_class_answer,name,NULL,NULL,deleted_at,NULL,parent_id,'.$poll,
      ];
    }

    public function setAnswer(Request $request, Validator $validator)
    {
      if( ($v = $validator::make($request->all(),$this->rules) and $v->fails()) or ($v = $validator::make(['name'=>\Request::ip()], $this->ip_rules($request->poll)) and $v->fails()))
        return redirect()->back()->withErrors($v->errors());

      $actLang = PH::getActiveLocalId();

      Node::push(16, $request->poll, null,
      [
        $actLang => [
            'name' => \Request::ip(),
            'link' => $request->option,
            'is_active' => true,
        ],
      ]);
      $poll = Model('poll')->where('node_id', $request->poll)->first();
        return redirect()->back();

    }
}
