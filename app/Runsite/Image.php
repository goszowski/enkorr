<?php

namespace App\Runsite;
use Image as baseImage;

class Image
{
  public static function createFrom($input, $filename, $size, $targetFolder) {

    if(! is_dir( public_path('imglib/' . $targetFolder . '/') )) mkdir(public_path('imglib/' . $targetFolder . '/'));
    $path = public_path('imglib/' . $targetFolder . '/' . $filename);

    list($originalWidth, $originalHeight) = getimagesize($input->getRealPath());
    $ratio = $originalWidth / $originalHeight;
    $targetWidth = $targetHeight = min($size, max($originalWidth, $originalHeight));

    if ($ratio < 1) {
        $targetWidth = $targetHeight * $ratio;
    } else {
        $targetHeight = $targetWidth / $ratio;
    }

    $background = baseImage::canvas($targetWidth, $targetHeight);
    $img = baseImage::make($input->getRealPath());
    $img->resize($targetWidth, $targetHeight, function($constraint) {
        $constraint->aspectRatio();
    });
    $background->insert($img, 'center');
    $background->save($path);
  }
}
