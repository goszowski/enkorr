<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Field_settings extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'field_settings';

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
      'class_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

    public function html_controls() {
      return $this->belongsTo('App\Runsite\Field_html_control_types', 'type_id');
    }

    public function clearSettings($field_id) {
      $this->where('field_id', $field_id)->delete();
    }

    public function setValues($request) {
      ;
    }

    public static function pull($settings, $parameter) {
      foreach($settings as $item) {
        if($item->_parameter == $parameter) {
          return $item->_value;
        }
      }
    }

    public function store($default_settings, $field_id, $class_id) {
      foreach($default_settings as $parameter=>$item) {
        $this->insert([
          '_parameter'=>$parameter,
          '_value'=>$item['_value'],
          '_info'=>$item['_info'],
          'field_id'=>$field_id,
          'class_id'=>$class_id,
          'control'=>$item['control']
        ]);
      }
    }
}
