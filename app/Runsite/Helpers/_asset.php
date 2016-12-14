<?php

function _asset($path)
{
  if(config('runsite.enable_ssl'))
  {
    return secure_asset($path);
  }

  return asset($path);
}
