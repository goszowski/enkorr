<?php

namespace App\Runsite;

use Illuminate\Database\Eloquent\Model;
use App\Runsite\Languages;

class Translation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'key',
      'language_id',
      '_value',
    ];

    public static function autoCreate($key)
    {
      $langs = Languages::where('is_active', true)->get();
      $existingTranses = Translation::where('key', $key)->get();
      foreach($langs as $lang)
      {
        if(!count($existingTranses->where('language_id', $lang->id)->first()))
        {
          self::create([
            'key' => $key,
            'language_id' => $lang->id,
            '_value' => $key,
          ]);
        }
      }
    }

    public function variants()
    {
      return Translation::where('key', $this->key)->get();
    }
}
