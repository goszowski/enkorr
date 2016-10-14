<?php

namespace App\Runsite;

use Illuminate\Database\Eloquent\Model;
use App\Runsite\NotifyUser;
use Auth;

class Notify extends Model
{
    protected $fillable = [
        'message',
    ];

    public $timestamps = true;

    public $table = 'notifycations';

    public $count = 5;

    protected $authUser = false;

    public function getMessages()
    {
      if(!$this->authUser)
      {
        $this->authUser = Auth::user();
      }
      return $this->where('created_at', '>=', $this->authUser->created_at)->take($this->count)->get();
    }

    public function isShowed()
    {
      if(!$this->authUser)
      {
        $this->authUser = Auth::user();
      }
      return NotifyUser::where('notification_id', $this->id)->where('user_id', $this->authUser->id)->count() ? true : false;
    }

}
