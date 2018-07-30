<?php
namespace App\Runsite;

// The Dynamic model for Runsite CMF

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Runsite\Libraries\PH;
use Illuminate\Notifications\Notifiable;
use App\Traits\Chart;
use App\Traits\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Dynamic extends Model
{
    use SoftDeletes, Notifiable, Chart, Table;

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


    public function getImageFromGalleryAttribute($value)
    {
        if(!$value or ! file_exists(public_path('gallery/'.$value)))
        {
            return 'asset/images/default_image.png';
        }

        return 'gallery/'.$value;
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('pubdate', '<=', Carbon::now());
    }

    public function scopeOrdered(Builder $builder)
    {
        return $builder->orderBy('pubdate', 'desc');
    }

    public function resultsAmount()
    {
        $titles = request('titles') ? true : ((!request('announces') and !request('texts')) ? true : false);
		$announces = request('announces') ? true : false;
        $texts = request('texts') ? true : false;
        
        $method = 'where';

        $res = Model($this->model);

		if($titles)
		{
            $res = $res->{$method}('name', 'like', '%'.request('term').'%');
            $method = 'orWhere';
		}

		if($announces)
		{
            $res = $res->{$method}($this->node->id == 47274 ? 'pub_title' : 'announce', 'like', '%'.request('term').'%');
            $method = 'orWhere';
		}

		if($texts)
		{
            $res = $res->{$method}('content', 'like', '%'.request('term').'%');
            $method = 'orWhere';
        }
        
        return $res->count();
    }

    public function getPhotoesAttribute()
    {
        return Model('photo')->where('parent_id', $this->node_id)->orderBy('orderby', 'asc')->get();;
    }


}
