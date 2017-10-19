<?php

namespace App\Runsite\Gallery;
use Illuminate\Database\Eloquent\Model;

class ImageTag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_image_tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image_id', 'tag_id'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
