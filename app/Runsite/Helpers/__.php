<?php
use App\Runsite\Languages;
use App\Runsite\Translation;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Runsite\Libraries\PH;

function __($key)
{
  $locale = LaravelLocalization::getCurrentLocale();
  $cacheName = md5($locale . $key);
  if(!PH::getGlobal($cacheName)) {
    $language = Languages::where('locale', $locale)->first();
    $trans = Translation::where('key', $key)->where('language_id', $language->id)->first();
    if(!count($trans))
    {
      Translation::autoCreate($key);
      return __($key);
    }
    PH::setGlobal($cacheName, $trans->_value);
  }

  return PH::getGlobal($cacheName);
}
