<?php

namespace App\Runsite;

use Illuminate\Database\Eloquent\Model;
use App\Runsite\User;
use Auth;

class NotifyUser extends Model
{
    protected $fillable = [
        'user_id', 'notification_id',
    ];

    public $timestamps = true;

    public $table = 'notifycation_user';

    protected $authUser = false;

}
