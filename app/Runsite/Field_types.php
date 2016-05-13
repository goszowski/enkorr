<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Field_types extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'field_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'input_controller'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

    public function group() {
      return $this->belongsTo('App\Runsite\Field_groups');
    }
}
