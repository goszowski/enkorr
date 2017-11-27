<?php

namespace App\Models\Import;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'enkorr-old';
}
