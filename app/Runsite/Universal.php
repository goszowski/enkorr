<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Universal extends Model
{

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

    public function __construct($tablename='', $fields=[]) {
      parent::__construct();
      $this->table = $tablename;
      $this->fillable = $fields;
    }


    public function node() {
      return $this->belongsTo('App\Runsite\Nodes');
    }




}
