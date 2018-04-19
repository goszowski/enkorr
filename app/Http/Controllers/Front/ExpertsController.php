<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class ExpertsController extends RSController
{
	/**
	 * Перегляд експерта.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$columns = Model('column')->where('expert_id', $this->fields->node_id)->orderBy('pubdate', 'desc')->paginate();

		return $this->make_view('experts.show', compact('columns'));
	}

}
