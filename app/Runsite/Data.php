<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
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

    public function init($table, $fillable) {
      $this->table = $table;
      $this->fillable = $fillable;
    }

    public function node() {
      return $this->belongsTo('App\Runsite\Nodes');
    }


}
