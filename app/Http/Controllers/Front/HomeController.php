<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class HomeController extends RSController
{
	/**
	 * Головна сторінка.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$first_main_news_item = Model('news_item')->where('is_main', true)->orderBy('pubdate', 'desc')->first();
		$main_news = Model('news_item')->where('is_main', true)->orderBy('pubdate', 'desc')->skip(1)->take(4)->get();
		$news = Model('news_item')->orderBy('pubdate', 'desc')->take(5)->get();
		$publications = Model('publication')->orderBy('pubdate', 'desc')->take(4)->get();
		$interviews = Model('interview')->orderBy('pubdate', 'desc')->take(5)->get();
		$columns = Model('column')->orderBy('pubdate', 'desc')->take(3)->get();

		return $this->make_view('roots.show', compact(
			'first_main_news_item',
			'main_news',
			'news',
			'publications',
			'interviews',
			'columns'
		));
	}

}
