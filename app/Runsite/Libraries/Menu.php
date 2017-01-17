<?php
namespace App\Runsite\Libraries;

use LaravelLocalization;
use Request;

class Menu {

  public static function isCurrent($absolutePath)
  {
      $absolutePath    = '/'.LaravelLocalization::setLocale().$absolutePath;
      $currentPath     = '/'.\Request::path();
      return str_is($absolutePath, $currentPath.'/') // тільки для головної
          or str_is($absolutePath, $currentPath) // str_is('/foo', '/foo'); return true
          or str_is($absolutePath.'/*', $currentPath); // str_is('/foo/*', '/foo/bar'); return true
  }



  public static function generate($parent_id, $template)
  {
      $items = Model('menu_item')->where('parent_id', $parent_id)->get();
      return view('navigation.'.$template, compact('items'));
  }


  public static function hasChild($parent_id)
  {
      return Model('menu_item')->where('parent_id', $parent_id)->count();
  }



}
