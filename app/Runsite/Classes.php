<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use App\Runsite\Nodes;

class Classes extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'name_more',
      'name_create',
      'shortname',
      'default_controller',
      'nodename_label',
      'access_edit_name',
      'access_edit_shortname',
      'limited_users_can_create',
      'limited_users_can_delete',
      'show_in_admin_tree',
      'cache',
      'can_export',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;
    public $prefix = '_class_';

    public function _fields() {
      return $this->hasMany('App\Runsite\Fields', 'class_id', 'id')->orderBy('sort', 'asc');
    }

    public function createSchema($class_name) {
      \Schema::create($this->prefix.$class_name, function(Blueprint $table)
      {
          $table->increments('id');
          $table->integer('node_id');
          $table->integer('language_id');
          $table->dateTime('created_at');
          $table->dateTime('updated_at');
      });
    }

    public function renameSchema($old_shortname, $new_shortname) {
      \Schema::rename($this->prefix.$old_shortname, $this->prefix.$new_shortname);
    }

    public function removeSchema($class_name) {
      \Schema::dropIfExists($this->prefix.$class_name);
    }

    public function setValues($request) {
      $this->name                        = $request->input('name');
      $this->name_more                   = $request->input('name_more');
      $this->name_create                 = $request->input('name_create');
      $this->shortname                   = str_slug($request->input('shortname'), '_');
      $this->default_controller          = $request->input('default_controller');
      $this->nodename_label              = $request->input('nodename_label');
      $this->access_edit_name            = $request->input('access_edit_name')           ? true : false; // checkbox input
      $this->access_edit_shortname       = $request->input('access_edit_shortname')      ? true : false; // checkbox input
      $this->limited_users_can_create    = $request->input('limited_users_can_create')   ? true : false; // checkbox input
      $this->limited_users_can_delete    = $request->input('limited_users_can_delete')   ? true : false; // checkbox input
      $this->show_in_admin_tree          = $request->input('show_in_admin_tree')         ? true : false; // checkbox input
      $this->cache                       = $request->input('cache')                      ? true : false; // checkbox input
      $this->can_export                  = $request->input('can_export');

      return $this;
    }


    public static function mapItems($class_name, $parent_id=false) {
      $nodes = false;
      $class = self::where('shortname', $class_name)->first();
      if($class) {
        $nodes = Nodes::where('class_id', $class->id);
        if($parent_id) {
          $nodes = $nodes->where('parent_id', $parent_id);
        }

        $nodes = $nodes->get();
      }
      return $nodes;
    }

}
