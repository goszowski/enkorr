<?php

namespace App\Models\Import;

class NewsItemAuthor extends BaseModel
{
	protected $table = 'authoring';

	protected $fillable = ['author_id', 'authoring_id'];

    public $timestamps = false;
}
