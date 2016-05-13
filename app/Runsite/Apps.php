<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Apps extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'apps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'execute',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;
}
