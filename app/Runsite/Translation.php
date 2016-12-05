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
      foreach($langs as $lang)
      {
        self::create([
          'key' => $key,
          'language_id' => $lang->id,
          '_value' => $key,
        ]);
      }
    }
}
