<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class PagesController extends RSController
{
	/**
	 * Перегляд сторінки.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		return $this->make_view('pages.show');
	}

}
