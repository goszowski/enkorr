<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'event_type_id', 'node_id'];


    public function user() {
      return $this->belongsTo('App\Runsite\User');
    }

    public function type() {
      return $this->belongsTo('App\Runsite\EventType', 'event_type_id');
    }

    public function node() {
      return $this->belongsTo('App\Runsite\Nodes', 'node_id');
    }

}
