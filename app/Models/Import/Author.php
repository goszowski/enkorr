<?php

namespace App\Models\Import;

class Author extends BaseModel
{
	protected $table = 'author';

	protected $fillable = ['name'];

    public $timestamps = false;
}
