<?php

namespace App\Runsite\FieldMiddlewares;
use App\Runsite\Fields;
use App\Runsite\Image as RunsiteImage;

class ImagesMultipleField extends Fields
{
  public static function runMiddleware($currentField, $value, $type, $settings) {
    if($value and is_array($value) and count($value) and isset($value[0]) and !empty($value[0])) {
      $defSizes = explode('/', self::getFieldParameter($settings, 'image_sizes'));
      $filenames = '';
      foreach($value as $k=>$v) {
        $filename = str_slug(
            str_shuffle(mt_rand(1, 9) .
            time() .
            mt_rand(1, 9)) .
            '-' .
            str_random(2) .
            '-' .
            time() .
            '-' .
            str_random(2)
            .'-'.
            mt_rand(1, 9)
        ).'.'.$v->getClientOriginalExtension();
        foreach($defSizes as $ks=>$size) {
          $targetFolder = $size.'px';
          if(! $ks) $targetFolder = 'full';
          if(++$ks == count($defSizes)) $targetFolder = 'thumb';
          RunsiteImage::createFrom($v, $filename, $size, $targetFolder);
        }

        $filenames .= $filename;
        if(++$k < count($value)) $filenames .= ',';

      }

      return $filenames;

    }
    else {
      return null;
    }
  }
}
