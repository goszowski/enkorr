<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Field_settings_default extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'field_settings_default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'field_id',
      '_parameter',
      '_value',
      '_info',
      'control',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

    public function prepare($type_id) {
      $output = false;
      $settings = $this->where('type_id', $type_id)->get();
      if($settings) {
        foreach($settings as $key=>$item) {
          $output[$item->_parameter] = ['_value'=>$item->_value, 'control'=>$item->control, '_info'=>$item->_info];
        }
      }
      return $output;
    }
}
