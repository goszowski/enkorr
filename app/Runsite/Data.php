<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
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

    public function init($table, $fillable) {
      $this->table = $table;
      $this->fillable = $fillable;
    }

    public function node() {
      return $this->belongsTo('App\Runsite\Nodes');
    }


}
