<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Field_html_control_types extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'field_html_control_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'field_id',
      'type_variant',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

}
