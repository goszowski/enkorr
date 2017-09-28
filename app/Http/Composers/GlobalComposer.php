<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class GlobalComposer
{
  protected $sections;
  protected $footer;
  protected $socials;
  protected $main_banner;

  public function __construct()
  {
    $this->sections = Model('menu_item')->where('parent_id', '=', 4)->orderBy('orderby', 'asc')->get();
    $this->footer = Model('index')->first()->footer;
    $this->socials = Model('menu_item')->where('parent_id', '=', 5)->orderBy('orderby', 'asc')->get();
    $this->main_banner = Model('main_banner')->where('parent_id', 1)->inRandomOrder()->first();
  }

  public function compose(View $view)
  {
    $view->with('sections', $this->sections)
         ->with('footer', $this->footer)
         ->with('socials', $this->socials)
         ->with('main_banner', $this->main_banner);
  }
}
