<?php namespace App\Runsite\Libraries;

class Mailing
{

  public static function sendRegistration($to, $name, $password) {
    $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('admin.emails.registration', ['password'=>$password], function($message) use($to, $name)
    {
        $message
            ->from(config('mail.from.address'))
            ->to($to, $name)
            ->subject(trans('admin/mailing.registration.subject'));
    });
  }
}
