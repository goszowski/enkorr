<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;
use Validator;

class AnswerController extends RSController
{
    protected $rules = [
      'quiz' => 'required|integer|exists:_class_quiz,node_id',
      'option' => 'required|integer|exists:_class_answer_option,node_id',
    ];

    protected function ip_rules($quiz)
    {
      return [
        'name' => 'required|ip|unique:_class_answer,name,NULL,NULL,deleted_at,NULL,parent_id,'.$quiz,
      ];
    }

    public function setAnswer(Request $request, Validator $validator)
    {
      if( ($v = $validator::make($request->all(),$this->rules) and $v->fails()) or ($v = $validator::make(['name'=>\Request::ip()], $this->ip_rules($request->quiz)) and $v->fails()))
        return redirect()->back()->withErrors($v->errors());

      $actLang = PH::getActiveLocalId();

      Node::push(16, $request->quiz, null,
      [
        $actLang => [
            'name' => \Request::ip(),
            'link' => $request->option,
            'is_active' => true,
        ],
      ]);
      $quiz = Model('quiz')->where('node_id', $request->quiz)->first();
      if(count($quiz))
        return redirect(lPath($quiz->node->absolute_path));
      else
        return redirect()->back();
    }
}
