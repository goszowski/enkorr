<?php
use App\Runsite\Libraries\PH;

function iPath($path, $size)
{
  return asset(PH::iPath($path, $size));
}
