<?php

namespace App\Http\Composers\Layouts;

use Illuminate\View\View;

class SearchComposer
{
	protected $categories;

	public function __construct()
	{
		$this->categories = Model('search_category')->orderBy('orderby', 'asc')->get();
	}

	public function compose(View $view)
	{
		$view->with('categories', $this->categories);
	}
}
