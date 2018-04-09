<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class InterviewsController extends RSController
{
	/**
	 * Перегляд списку інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$interviews = Model('interview')->published()->ordered()->paginate();
		$first_interview = $interviews->first();

		return $this->make_view('interviews.index', compact('interviews', 'first_interview'));
	}

	/**
	 * Перегляд інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		
	}

}
