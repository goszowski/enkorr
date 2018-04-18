<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class SearchController extends RSController
{
	private function results($model_name)
	{
		return Model($model_name)->where('name', 'like', '%'.request('term').'%')->orderBy('pubdate', 'desc')->paginate();
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
