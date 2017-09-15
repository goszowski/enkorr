<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class GlobalComposer
{
  protected $sections;
  protected $footer;
  protected $socials;

  public function __construct()
  {
    $this->sections = Model('menu_item')->where('parent_id', '=', 4)->orderBy('orderby', 'asc')->get();
    $this->footer = Model('index')->first()->footer;
    $this->socials = Model('menu_item')->where('parent_id', '=', 5)->orderBy('orderby', 'asc')->get();
  }

  public function compose(View $view)
  {
    $view->with('sections', $this->sections)
         ->with('footer', $this->footer)
         ->with('socials', $this->socials);
  }
}
