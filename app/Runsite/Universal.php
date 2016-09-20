<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Runsite\Libraries\Node;
use App\Runsite\Libraries\PH;

class Universal extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $dates = ['deleted_at'];

    public function __construct($tablename='', $fields=[]) {
      parent::__construct();
      $this->table = $tablename;
      $this->fillable = $fields;
    }


    public function node() {
      return $this->belongsTo('App\Runsite\Nodes');
    }

    public function relationTo($class_name, $field_name=false) {

      if(!$field_name)
        $field_name = $class_name . '_id';

      // if($remember = PH::getGlobal('universalRelation' . $this->node_id . $this->{$field_name}) and count($remember)) {
      //   return $remember;
      //
      // }
      // else {
      //   $remember = Node::getU($class_name)->where('node_id', $this->{$field_name})->first();
      //   PH::setGlobal('universalRelation' . $this->node_id . $this->{$field_name}, $remember);
      // }

      $remember = PH::getGlobal('universalRelation' . $this->node_id . $this->{$field_name});
      if(!$remember)
      {
        $remember = Node::getU($class_name)->where('node_id', $this->{$field_name})->first();
        PH::setGlobal('universalRelation' . $this->node_id . $this->{$field_name}, $remember);
      }

      $this->{$class_name} = $remember;
      return $this->{$class_name};
    }

    public function hasMore($class_name, $field_name=false)
    {
      if(!$field_name)
        $field_name = str_plural($class_name);


      if(empty($this->{$field_name}))
        return false;

      $ids = explode(',', $this->{$field_name});

      // if($remember = PH::getGlobal('universalRelationToMany' . $this->node_id . $this->{$field_name}) and $remember) {
      //   return $remember;
      //
      // }
      // else {
      //   $remember = Node::getU($class_name)->whereIn('node_id', $ids)->get();
      //   PH::setGlobal('universalRelationToMany' . $this->node_id . $this->{$field_name}, $remember);
      // }
      $remember = PH::getGlobal('universalRelationToMany' . $this->node_id . $this->{$field_name});
      if(!$remember)
      {
        $remember = Node::getU($class_name)->whereIn('node_id', $ids)->get();
      }

      // if(!count($remember))return false;

      $this->{$field_name} = $remember;
      return $this->{$field_name};

    }

    public function has($class_name, $field_name=false)
    {
      return $this->relationTo($class_name, $field_name);
    }




}
