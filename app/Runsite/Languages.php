<?php

namespace App\Runsite;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'locale',
      'name',
      'is_active',
      'is_default',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = false;

    public function setValues($request) {
      $this->locale         = $request->input('locale');
      $this->name           = $request->input('name');
      $this->is_active      = $request->input('is_active') ? true : false; // checkbox input

      if($request->input('is_default'))
        $this->is_default   = true;

      return $this;
    }

    public function getDefaultId() {
      return $this->where('is_default', true)->first()->id;
    }

    public function getDefault() {
      return $this->where('is_default', true)->first();
    }
}
