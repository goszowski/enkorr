<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class TagsController extends RSController
{
	/**
	 * Перегляд інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$publications = Model('publication')
			->published()
			->whereRaw("FIND_IN_SET('{$this->fields->node_id}', tags) > 0")
			->ordered()
			->paginate()->toBase();

		$news_items = Model('news_item')
			->published()
			->whereRaw("FIND_IN_SET('{$this->fields->node_id}', tags) > 0")
			->ordered()
			->paginate()->toBase();

		$interviews = Model('interview')
			->published()
			->whereRaw("FIND_IN_SET('{$this->fields->node_id}', tags) > 0")
			->ordered()
			->paginate()->toBase();

		$columns = Model('column')
			->published()
			->whereRaw("FIND_IN_SET('{$this->fields->node_id}', tags) > 0")
			->ordered()
			->paginate()->toBase();

		$publications = $publications->merge($news_items);
		$publications = $publications->merge($interviews);
		$publications = $publications->merge($columns);

		return $this->make_view('tags.show', compact('publications'));
	}

}
