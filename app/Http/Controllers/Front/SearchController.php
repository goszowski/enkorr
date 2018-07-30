<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class SearchController extends RSController
{
	private function results($model_name)
	{
		$titles = request('titles') ? true : ((!request('announces') and !request('texts')) ? true : false);
		$announces = request('announces') ? true : false;
		$texts = request('texts') ? true : false;

		$method = 'where';

		$results = Model($model_name);

		if($titles)
		{
			$results = $results->{$method}('name', 'like', '%'.request('term').'%');
			$method = 'orWhere';
		}

		if($announces)
		{
			$results = $results->{$method}($this->node->id == 47274 ? 'pub_title' : 'announce', 'like', '%'.request('term').'%');
			$method = 'orWhere';
		}

		if($texts)
		{
			$results = $results->{$method}('content', 'like', '%'.request('term').'%');
			$method = 'orWhere';
		}

		return $results->orderBy('pubdate', 'desc')->paginate();
	}

	/**
	 * Форма пошуку.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		return $this->make_view('search.show');
	}

	/**
	 * Пошук по новинах.
	 * @return \Illuminate\Http\Response
	 */
	public function news()
	{
		$results = $this->results('news_item');
		$parent = Model('page')->where('node_id', $this->fields->parent_id)->first();
		return $this->make_view('search.show', compact('results', 'parent'));
	}

	/**
	 * Пошук по публікаціях.
	 * @return \Illuminate\Http\Response
	 */
	public function publications()
	{
		$results = $this->results('publication');
		$parent = Model('page')->where('node_id', $this->fields->parent_id)->first();
		return $this->make_view('search.show', compact('results', 'parent'));
	}

	/**
	 * Пошук по інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function interview()
	{
		$results = $this->results('interview');
		$parent = Model('page')->where('node_id', $this->fields->parent_id)->first();
		return $this->make_view('search.show', compact('results', 'parent'));
	}

	/**
	 * Пошук по колонках.
	 * @return \Illuminate\Http\Response
	 */
	public function columns()
	{
		$results = $this->results('column');
		$parent = Model('page')->where('node_id', $this->fields->parent_id)->first();
		return $this->make_view('search.show', compact('results', 'parent'));
	}

}
