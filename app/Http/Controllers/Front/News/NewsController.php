<?php

namespace App\Http\Controllers\Front\News;

use Illuminate\Http\Request;
use App\Http\Controllers\RSController;

class NewsController extends RSController
{
	/**
	 * Перегляд списку новин.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$news = Model('news_item')->published()->ordered()->paginate();
		$banners = Model('banner')->where('right', true)->where('news_bool', true)->orderBy('orderby', 'asc')->get();

		return $this->make_view('news.index', compact('news', 'banners'));
	}

	/**
	 * Перегляд новини.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		// Попередня і наступна публікації
		$prev = Model('news_item')->where('pubdate', '<', $this->fields->pubdate)->orderBy('pubdate', 'desc')->first();
		$next = Model('news_item')->where('pubdate', '>', $this->fields->pubdate)->orderBy('pubdate', 'asc')->first();

		// Матеріали по темі
		$tags = $this->fields->hasMore('tags'); // Отримуються теги поточної публікації
		$materials = []; // Оголошується порожній масив для матеріалів по темі

		if(count($tags)) // Якшо є теги то можна отримати матеріали по темі.
		{
			$materials = Model('news_item')
				->published() // Беремо тільки ті новини де дата публікації вже в минулому часі
				->where('node_id', '!=', $this->fields->node_id) // Прибираємо з виборки поточну публікацію
				->where(function($w) use($tags) {
					foreach($tags as $k=>$tag)
					{
						$method = ! $k ? 'whereRaw' : 'orWhereRaw';
						$w->{$method}("FIND_IN_SET('{$tag->node_id}', tags) > 0");
					}
				})
				->ordered() // Відсортовано по даті
				->take(5)
				->get();
		}

		// Коментарі публікації
		$comments = Model('comment')->where('parent_id', $this->fields->node_id)->orderBy('created_at', 'asc')->get();

		// Останні новини
		$last_news = Model('news_item')
			->published()
			->where('node_id', '!=', $this->fields->node_id) // Прибираємо з виборки поточну публікацію
			->ordered()
			->take(3)
			->get();

		// Головні новини
		$main_news = Model('news_item')
			->published()
			->where('node_id', '!=', $this->fields->node_id) // Прибираємо з виборки поточну публікацію
			->where('is_main', true)
			->ordered()
			->take(3)
			->get();

		// Банери
		$banners_right_side = Model('banner')->where('right', true)->where('in_new_bool', true)->orderBy('orderby', 'asc')->get();
		$banners_under_text = Model('banner')->where('down', true)->where('in_new_bool', true)->orderBy('orderby', 'asc')->get();

		return $this->make_view('news.show', compact('prev', 'next', 'materials', 'comments', 'last_news', 'main_news', 'banners_right_side', 'banners_under_text'));
	}

}
