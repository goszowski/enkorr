<?php

namespace App\Models\Import;

class Tag extends BaseModel
{
	protected $table = 'tag';

	protected $fillable = ['name'];

    public $timestamps = false;
}
