<?php

namespace App\Runsite\Libraries;

use Session;

class Alert
{

    public static function success($message)
    {
      return Alert::message('success', $message);
    }

    public static function error($message)
    {
      return Alert::message('error', $message);
    }

    public static function warning($message)
    {
      return Alert::message('warning', $message);
    }

    public static function info($message)
    {
      return Alert::message('info', $message);
    }

    public static function message($type, $message)
    {
      Session::flash('alert-'.$type, $message);
    }
}
