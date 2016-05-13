<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class User_group_nodes_rights extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_group_nodes_rights';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'group_id',
      'node_id',
      'rights',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;
}
