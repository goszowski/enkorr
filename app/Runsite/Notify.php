<?php

namespace App\Runsite;

use Illuminate\Database\Eloquent\Model;
use App\Runsite\NotifyUser;
use Auth;

class Notify extends Model
{
    protected $fillable = [
        'message',
        'icon',
        'icon_color',
        'node_id',
    ];

    public $timestamps = true;

    public $table = 'notifycations';

    public $count = 15;

    protected $authUser = false;

    public function getMessages()
    {
      $items = $this->where('created_at', '>=', Auth::user()->created_at)->take($this->count)->orderBy('created_at', 'desc')->with('userViews')->get();
      return $items;
    }

    public function isShowed()
    {
      if(!$this->authUser)
      {
        $this->authUser = Auth::user();
      }
      return NotifyUser::where('notification_id', $this->id)->where('user_id', $this->authUser->id)->count() ? true : false;
    }

    public function userViews()
    {
      return $this->belongsTo('App\Runsite\NotifyUser', 'id', 'notification_id')->where('user_id', Auth::user()->id);
    }

}
