<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'type_id',
      'class_id',
      'group_id',
      'name',
      'shortname',
      'required',
      'shown',
      'sort',
      'ignore_language',
      'hint',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;
    protected $prefix = '_class_';

    public function group() {
      return $this->belongsTo('App\Runsite\Field_groups');
    }

    public function type() {
      return $this->belongsTo('App\Runsite\Field_types', 'type_id');
    }

    public function settings() {
      return $this->hasMany('App\Runsite\Field_settings', 'field_id');
    }

    public function addSchemaField($shortname, $field_name, $field_type, $field_size) {
      \Schema::table($this->prefix.$shortname, function($table) use($field_name, $field_type, $field_size) {
          $table->{$field_type}($field_name, $field_size ? $field_size : NULL)->nullable();
      });
    }

    public function renameSchema($old_shortname, $new_shortname, $table_prefix, $table_name) {
      \Schema::table($table_prefix.$table_name, function($table) use($old_shortname, $new_shortname) {
          $table->renameColumn($old_shortname, $new_shortname);
      });
    }

    public function changeSchemaType($table_prefix, $table_name, $field_name, $field_type, $field_size) {
      \Schema::table($table_prefix.$table_name, function($table) use($field_name, $field_type, $field_size) {
        $table->{$field_type}($field_name, $field_size ? $field_size : NULL)->nullable()->change();
      });
    }

    public function removeSchema($table_prefix, $table_name, $field_name) {
      \Schema::table($table_prefix.$table_name, function($table) use($field_name) {
          $table->dropColumn($field_name);
      });
    }

    public function setValues($request, $update=false) {
      $this->name                 = $request->input('name');
      $this->shortname            = $request->input('shortname');
      $this->type_id              = $request->input('type_id');
      $this->group_id             = $request->input('group_id');
      $this->class_id             = $request->input('class_id');
      $this->required             = $request->input('required') ? true : false; // checkbox input
      $this->shown                = $request->input('shown') ? true : false; // checkbox input
      if(! $update) $this->sort   = $this->where('class_id', $request->input('class_id'))->count() + 1;
      $this->ignore_language      = $request->input('ignore_language') ? true : false; // checkbox input
      $this->hint                 = $request->input('hint');

      return $this;
    }
}
