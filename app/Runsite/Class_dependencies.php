<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Class_dependencies extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'class_dependencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'class_id',
      'subclass_id',
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
