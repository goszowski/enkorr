<?php namespace App\Runsite\Libraries;


use App\Runsite\Languages;
use App\Runsite\Nodes;
use App\Runsite\Classes;
use App;
use LaravelLocalization;

class PH
{



  public static function getLangs() {
    if(! PH::getGlobal('langs')) {
      PH::setGlobal('langs', Languages::where('is_active', true)->get());
    }
    return PH::getGlobal('langs');
  }

  public static function iPath($path, $size) {
    return 'imglib/' . $size . '/' . $path;
  }

  public static function lPath($path) {
    return LaravelLocalization::getLocalizedURL(null,$path);
  }

  public static function findRoute($uri='/') {
    if($uri != '/') $uri = '/'.$uri;
    $node = Nodes::where('absolute_path', $uri)->first();
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

      if(!$controller)
        abort(404); // Якщо контроллер ніде не прописаний то 404

      $controllerParts = explode('@', $controller);
      //$RunsiteNode = ['id' => $node->id, 'parent_id' => $node->parent_id];
      //Request::input('RunsiteNode', $node);
      $GLOBALS['RunsiteNode'] = $node;
      return App::make('App\Http\Controllers'.'\\'.$controllerParts[0])->$controllerParts[1](1,2);
    }
    else {
      abort(404);
    }
  }

  public static function getGlobal($name) {
    if(isset($GLOBALS['runsite_cms']) and isset($GLOBALS['runsite_cms'][$name])) {
      return $GLOBALS['runsite_cms'][$name];
    }
    else return false;
  }

  public static function setGlobal($name, $val) {
    $GLOBALS['runsite_cms'][$name] = $val;
  }

}
