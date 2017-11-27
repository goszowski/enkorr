<?php

namespace App\Models\Import;

class NewsItemData extends BaseModel
{
	protected $table = 'news_i18n';

	protected $fillable = ['title', 'announce', 'body', 'id'];

    public $timestamps = false;
}
