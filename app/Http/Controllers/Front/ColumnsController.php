<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\RSController;

class ColumnsController extends RSController
{
    /**
     * Перегляд списку інтерв'ю.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = Model('column')->published()->ordered()->paginate(16);
        $first_column = $columns->first();

        return $this->make_view('columns.index', compact('columns', 'first_column'));
    }

    /**
     * Перегляд інтерв'ю.
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Попередня і наступна публікації
        $prev = Model('column')->where('pubdate', '<', $this->fields->pubdate)->orderBy('pubdate', 'desc')->first();
        $next = Model('column')->where('pubdate', '>', $this->fields->pubdate)->orderBy('pubdate', 'asc')->first();

        // Матеріали по темі
        $tags = $this->fields->hasMore('tags'); // Отримуються теги поточної публікації
        $materials = []; // Оголошується порожній масив для матеріалів по темі

        if(count($tags)) // Якшо є теги то можна отримати матеріали по темі.
        {
            $materials = Model('column')
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
        $last_columns = Model('column')
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

        return $this->make_view('columns.show', compact('prev', 'next', 'materials', 'comments', 'last_columns', 'main_news', 'banners_right_side', 'banners_under_text'));
    }

}
