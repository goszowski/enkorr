<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class PublicationsController extends RSController
{
	/**
	 * Перегляд списку інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$publications = Model('publication')->published()->ordered()->paginate();
		$first_publication = $publications->first();

		return $this->make_view('publications.index', compact('publications', 'first_publication'));
	}

	/**
	 * Перегляд інтерв'ю.
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		// Попередня і наступна публікації
		$prev = Model('publication')->where('pubdate', '<', $this->fields->pubdate)->orderBy('pubdate', 'desc')->first();
		$next = Model('publication')->where('pubdate', '>', $this->fields->pubdate)->orderBy('pubdate', 'asc')->first();

		// Матеріали по темі
		$tags = $this->fields->hasMore('tags'); // Отримуються теги поточної публікації
		$materials = []; // Оголошується порожній масив для матеріалів по темі

		if(count($tags)) // Якшо є теги то можна отримати матеріали по темі.
		{
			$materials = Model('publication')
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

		// Коментарі публікації, тільки модеровані
		$comments = Model('comment')->where('parent_id', $this->fields->node_id)->where('is_moderated', true)->orderBy('created_at', 'asc')->get();

		// Останні публікації
		$last_publications = Model('publication')
			->published()
			->where('node_id', '!=', $this->fields->node_id) // Прибираємо з виборки поточну публікацію
			->ordered()
			->take(2)
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
		$banners_right_side = Model('banner')->where('right', true)->where('publ_bool', true)->orderBy('orderby', 'asc')->get();
		$banners_under_text = Model('banner')->where('down', true)->where('publ_bool', true)->orderBy('orderby', 'asc')->get();

		$texts = Model('text')->where('parent_id', $this->fields->node_id)->orderBy('orderby', 'asc')->get();

		return $this->make_view('publications.show', compact('prev', 'next', 'materials', 'comments', 'last_publications', 'main_news', 'banners_right_side', 'banners_under_text', 'texts'));
	}

}
