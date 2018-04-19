<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class SpeakersController extends RSController
{
	/**
	 * Display the specified resource.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$interviews = Model('interview')->where('speaker_id', $this->fields->node_id)->orderBy('pubdate', 'desc')->paginate();
		return $this->make_view('speakers.show', compact('interviews'));
	}

}
