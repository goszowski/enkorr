<?php
use App\Runsite\Libraries\Node;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App\Runsite\Libraries\PH;

Route::post('/quiz-answer', ['as' => 'quizAnswer', 'uses'=>'Front\AnswerController@setAnswer']);

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect' ]], function()
{

  // $uri = LaravelLocalization::getNonLocalizedURL(\Request::path());
  //
  //   $uri = str_replace(config('app.url'), '', $uri);
  //   // dd(LaravelLocalization::setLocale());
  //   if($uri != '/' and !str_is('/*', $uri)) $uri = '/'.$uri;

  $path = str_replace(\Request::root(), '', LaravelLocalization::getNonLocalizedURL(\Request::path()));

  $node = Nodes::where('absolute_path', $path)->first();

  // $node = \Cache::remember('absolute_path_'.md5($uri), 15, function() use($uri) {
  //     return Nodes::where('absolute_path', $uri)->first();
  // });

  if($node) {
    if($node->controller) {
      // Якщо контроллер прописаний в вузлі то юзаєм його
      $controller = $node->controller;
    }
    else {
      // Якщо контроллер не вказано то пробуємо витягнути "контроллер по замовчуванню" з класу
      $class = Classes::find($node->class_id);
      $controller = $class->default_controller;
    }
    PH::setGlobal('RunsiteNode', $node);

    if($controller) {
      Route::any('/', ['uses'=>'Front\\'.$controller]);
      Route::any('{slug}', ['uses'=>'Front\\'.$controller])->where('slug', '([A-z\d-\/_.]+)?');
    }

  }

});
