<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class WidgetComposer
{
  protected $latest_news;
  protected $popular_publications;

  public function __construct()
  {
    $this->latest_news = Model('publication')
                          ->where('parent_id', config('public.sections.news'))
                          ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                          ->orderBy('pubdate', 'desc')
                          ->limit(5)
                          ->get();

    $this->popular_publications = Model('publication')
                                    ->where('parent_id', '!=', config('public.sections.news'))
                                    ->where('pubdate', '<=', date('Y-m-d H:i:s'))
                                    ->orderBy('popular', 'desc')
                                    ->limit(5)
                                    ->orderBy('pubdate', 'desc')
                                    ->get();
  }

  public function compose(View $view)
  {
    $view->with('latest_news', $this->latest_news)
         ->with('popular_publications', $this->popular_publications);
  }
}
