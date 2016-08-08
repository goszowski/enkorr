<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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




}
