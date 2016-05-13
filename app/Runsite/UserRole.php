<?php

namespace App\Runsite;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'user_id', 'role_id',
    ];

    public $timestamps = true;

    public $table = 'user_role';

}
