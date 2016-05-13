<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class User_groups extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'info',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;
}
