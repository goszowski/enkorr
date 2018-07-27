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

		// Головні новини, з позначкою is_main і з пропуском першої (перша відображається в окремому контейнері)
		$main_news = Model('news_item')->where('is_main', true)->orderBy('pubdate', 'desc')->skip(1)->take(4)->get();

		// Останні новини, бе позначки is_main
		$news = Model('news_item')->where('is_main', false)->orderBy('pubdate', 'desc')->take(6)->get();

		$publications = Model('publication')->orderBy('pubdate', 'desc')->take(4)->get();
		$interviews = Model('interview')->orderBy('pubdate', 'desc')->take(5)->get();
		$columns = Model('column')->orderBy('pubdate', 'desc')->take(3)->get();

		// 4 позиції банерів
		$banners[1] = Model('banner')->where('home_1', true)->orderBy('orderby', 'asc')->get();
		$banners[2] = Model('banner')->where('home_2', true)->orderBy('orderby', 'asc')->get();
		$banners[3] = Model('banner')->where('home_3', true)->orderBy('orderby', 'asc')->get();
		$banners[4] = Model('banner')->where('home_4', true)->orderBy('orderby', 'asc')->get();

		return $this->make_view('roots.show', compact(
			'first_main_news_item',
			'main_news',
			'news',
			'publications',
			'interviews',
			'columns',
			'banners'
		));
	}

}
