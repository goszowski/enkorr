<?php

namespace App\Models\Import;

use Carbon\Carbon;
use App\Runsite\Libraries\Store;

class NewsItem extends BaseModel
{
	protected $table = 'news';

	protected $fillable = ['main_news_type_id', 'is_published', 'published_at', 'human_url', 'number_views'];

    public $timestamps = false;

    protected $categoryIds = [
    	13 => 12, // publications - publications
    	14 => 12, // inteviews - experts
    	14 => 15, // columns - experts
    	16 => 11, // news - news
    ];

    protected $themes = [
    	13 => 23,
    	14 => 25,
    	14 => 122,
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'main_news_type_id');
    }

    public function data()
    {
    	return $this->belongsTo(NewsItemData::class, 'id');
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class, 'tagging', 'taggable_id', 'tag_id');
    }

    public function authors()
    {
    	return $this->belongsToMany(Author::class, 'authoring', 'authoring_id', 'author_id');
    }

    public function buildParentID()
    {
    	return $this->categoryIds[$this->category->id] ?? false;
    }

    public function buildPath()
    {
    	return '/a/' . $this->category->url_segment . '/' . $this->human_url . '/' . $this->id;
    }

    public function buildTags()
    {
    	$tags = $this->tags;
    	$out = '';

    	if(!count($tags))
    	{
    		return '';
    	}

    	foreach($tags as $k=>$tag)
    	{
    		$existsTag = Model('tag')->where('name', $tag->name)->first();
    		if(!$existsTag)
    		{
    			$existsTag = (new Store)->node('tag', $tag->name, 63);
    			$existsTag->ru->name = $tag->name;
    			$existsTag->ru->is_active = true;
    			$existsTag->ru->save();
    			$existsTag = $existsTag->ru;
    		}

    		$out .= $existsTag->node_id;
    		if(++$k < count($tags))
    		{
    			$out .= ',';
    		}
    	}

    	return $out;
    }

    public function buildAuthors()
    {
    	$authors = $this->authors;
    	$out = '';

    	if(!count($authors))
    	{
    		return '';
    	}

    	foreach($authors as $k=>$author)
    	{
    		$existsAuthor = Model('author')->where('name', $author->name)->first();
    		if(!$existsAuthor)
    		{
    			$existsAuthor = (new Store)->node('author', $author->name, 63);
    			$existsAuthor->ru->name = $author->name;
    			$existsAuthor->ru->is_active = true;
    			$existsAuthor->ru->save();
    			$existsAuthor = $existsAuthor->ru;
    		}

    		$out .= $existsAuthor->node_id;
    		if(++$k < count($authors))
    		{
    			$out .= ',';
    		}
    	}

    	return $out;
    }

    public function getThemeId()
    {
    	return $this->themes[$this->category->id] ?? null;
    }

    public function buildData()
    {
    	return [
    		'name' => $this->data->title,
    		'is_active' => true,
    		'pub_title' => $this->data->announce,
    		'image_from_gallery' => '',
    		'photo_text' => '',
    		'content' => $this->data->body,
    		'pinned' => false,
    		'bold' => false,
    		'theme_id' => $this->getThemeId(),
    		'tag_ids' => $this->buildTags(),
    		'pubdate' => $this->published_at,
    		'popular' => $this->number_views,
    		'author_ids' => $this->buildAuthors(),
    		'similar_publications' => '',
    		'description' => $this->data->announce,
    		'title' => $this->data->title,
    		'old_path' => $this->buildPath(),
    	];
    }
}
