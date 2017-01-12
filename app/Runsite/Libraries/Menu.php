<?php
namespace App\Runsite\Libraries;

use LaravelLocalization;
use Request;

class Menu {

  public static function isCurrent($absolutePath) {
      $absolutePath    = '/'.LaravelLocalization::setLocale().$absolutePath;
      $currentPath     = '/'.\Request::path();
      return str_is($absolutePath, $currentPath.'/') // тільки для головної
          or str_is($absolutePath, $currentPath) // str_is('/foo', '/foo'); return true
          or str_is($absolutePath.'/*', $currentPath); // str_is('/foo/*', '/foo/bar'); return true
    }
}
