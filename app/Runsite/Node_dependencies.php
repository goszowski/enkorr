<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Node_dependencies extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'node_dependencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'node_id',
      'subclass_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

    public function classes() {
      return $this->belongsTo('App\Runsite\Classes', 'subclass_id');
    }
}
