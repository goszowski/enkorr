<?php

namespace App\Runsite\FieldMiddlewares;
use App\Runsite\Fields;
use App\Runsite\Image as RunsiteImage;

class ImageField extends Fields
{
  public static function runMiddleware($currentField, $value, $type, $settings) {
    if($value and $value != '___remove___') {
      $defSizes = explode('/', self::getFieldParameter($settings, 'image_sizes'));
      if(! is_array($value)) {
        $filename = str_slug(
            str_shuffle(mt_rand(100, 999) .
            time() .
            mt_rand(100, 999)) .
            '-' .
            str_random(10) .
            '-' .
            time() .
            '-' .
            str_random(5)
            .'-'.
            mt_rand(100, 999)
        ).'.'.$value->getClientOriginalExtension();
        foreach($defSizes as $k=>$size) {
          $targetFolder = $size.'px';
          if(! $k) $targetFolder = 'full';
          if(++$k == count($defSizes)) $targetFolder = 'thumb';
          RunsiteImage::createFrom($value, $filename, $size, $targetFolder);
        }

        return $filename;
      }
    }
    else {
      return null;
    }
  }
}
