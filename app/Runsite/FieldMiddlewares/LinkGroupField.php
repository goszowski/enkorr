<?php

namespace App\Runsite\FieldMiddlewares;
use App\Runsite\Fields;

class LinkGroupField extends Fields
{
  public static function runMiddleware($currentField, $value, $type, $settings) {
    if($value) {
      $tmp = '';
      foreach($value as $k=>$v) {
        $tmp .= $v;
        if(++$k < count($value)) $tmp .= ',';
      }

      return $tmp;
    }
    else {
      return null;
    }
  }
}
