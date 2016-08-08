<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];




}
