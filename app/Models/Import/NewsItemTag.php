<?php

namespace App\Models\Import;

class NewsItemTag extends BaseModel
{
	protected $table = 'tagging';

	protected $fillable = ['tag_id', 'taggable_id'];

    public $timestamps = false;
}
