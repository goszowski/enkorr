<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class AuthorsController extends RSController
{
	/**
	 * Перегляд інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$publications = Model('publication')
			->published()
			->whereRaw("FIND_IN_SET('{$this->fields->node_id}', authors) > 0")
			->ordered()
			->paginate();

		return $this->make_view('authors.show', compact('publications'));
	}

}
