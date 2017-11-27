<?php

namespace App\Models\Import;

class Category extends BaseModel
{
	protected $table = 'news_type';

	protected $fillable = ['url_segment'];

    public $timestamps = false;
}
