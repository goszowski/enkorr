<?php

namespace App\Models\Import;

class Price extends BaseModel
{
	protected $table = 'prices';

	protected $fillable = ['type_id', 'is_published', 'date', 'fuel_1', 'fuel_2'];

    public $timestamps = false;

    public $types = [
    	1 => 179,
    	5 => 180,
    	6 => 181,

    	7 => 176,
    	8 => 177,
    	9 => 178,
    ];

    public function getTypeId()
    {
    	return $this->types[$this->type_id] ?? null;
    }

    public function getParentId()
    {
    	return in_array($this->type_id, [1,5,6]) ? 175 : 174;
    }
}
