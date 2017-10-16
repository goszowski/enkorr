<?php
namespace App\Runsite;

// The Dynamic model for Runsite CMF

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Runsite\Libraries\PH;
use Illuminate\Notifications\Notifiable;
use App\Traits\Chart;

class Dynamic extends Model
{
    use SoftDeletes, Notifiable, Chart;

    protected $table    = '';
    protected $fillable = [];
    protected $dates    = ['deleted_at', 'pubdate', 'date'];

    public function __construct($table=null)
    {
        parent::__construct();

        if($table)
        {
            $this->table = $table;
            PH::setGlobal('DMTN', $table);
        }
        elseif(PH::getGlobal('DMTN'))
        {
            $this->table = PH::getGlobal('DMTN');
        }

    }

    public function node() {
      return $this->belongsTo('App\Runsite\Nodes');
    }


    // Template: $this->has('user');

    public function has($modelName)
    {
      $this->{$modelName} =  Model($modelName)->where('node_id', $this->{$modelName.'_id'})->first();
      return $this->{$modelName};
    }

    // Template: $this->has('users');

    public function hasMore($fieldName)
    {
      $ids = explode(',', $this->{$fieldName});
      $this->{$fieldName} = Model(str_singular($fieldName))->whereIn('node_id', $ids)->get();
      return $this->{$fieldName};
    }


}
