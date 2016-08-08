<?php namespace App\Runsite\Libraries;

use App\Runsite\Classes;
use App\Runsite\Fields;
use App\Runsite\Nodes;
use App\Runsite\Data;
use App\Runsite\Languages;

class Locale
{

  public static function getDefByNode($node_id) {

    if($node_id) {
      $_NODE = Nodes::find($node_id);
      if($_NODE) {
        $_CLASS = Classes::find($_NODE->class_id);
        $_FIELDS = Fields::where('class_id', $_CLASS->id)->get();
        $_LANGUAGE = new Languages;

        $_DATA = new Data;
        $_DATA->init($_CLASS->prefix . $_CLASS->shortname, $_FIELDS);

        $_VALUES = $_DATA->where('node_id', $_NODE->id)->where('language_id', $_LANGUAGE->getDefaultId())->first();

        return $_VALUES;
      }
      return null;
    }

  }

}
