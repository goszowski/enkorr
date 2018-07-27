<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;
use App\Runsite\Libraries\Node;
use Validator;
use Session;
use Mail;
use App\Mail\NewComment;

class CommentController extends RSController
{

    protected $rules = [
      'text' => 'required|string|max:512',
      'publication_id' => 'required|integer',
    ];

    public function store(Request $request, Validator $validator)
    {
        // Делаем валидацию реквеста, создаем новый комментарий
        if($v = $validator::make($request->all(), $this->rules) and $v->fails()) {
            dd('aa');
          return redirect()->back()->withErrors($v->errors());
        }

        $comment_node_id = Node::push(10, $request->publication_id, md5(time() + mt_rand(1000,9999)), [ 3 => [
            'user_id' => Session::get('authUser')->node_id,
            'content' => $request->text,
            'is_active' => true,
            'is_moderated' => false,
          ],
        ]);

        // Отримуємо рутовий розділ з контактним емейлом.
        $root = Model('index')->first();

        // Відсилаємо лист на вказаний email з інформацією про новий коментар.
        Mail::to($root->email)->send(new NewComment($comment_node_id, $request->text));

        return redirect()->back()->with('message', __('Ваш комментарий успешно отправлен на модерацию'));
    }

}
