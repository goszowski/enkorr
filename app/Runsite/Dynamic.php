<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;
use App\Runsite\Libraries\PH;

class Dynamic extends Model
{
    use SoftDeletes;

    protected $table = '';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $dates = ['deleted_at'];

    public function __construct($table=null)
    {
        parent::__construct();

        if($table)
        {
            $this->table = $table;
            PH::setGlobal('dynamic_model_table_name', $table);
        }
        elseif(PH::getGlobal('dynamic_model_table_name'))
        {
            $this->table = PH::getGlobal('dynamic_model_table_name');
        }

    }


}
