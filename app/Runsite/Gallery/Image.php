<?php

namespace App\Runsite\Gallery;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['source', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'gallery_image_tag', 'image_id', 'tag_id');
    }
}
