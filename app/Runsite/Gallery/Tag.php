<?php

namespace App\Runsite\Gallery;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function images()
    {
        return $this->belongsToMany(Tag::class, 'gallery_image_tag', 'tag_id', 'image_id');
    }
}
