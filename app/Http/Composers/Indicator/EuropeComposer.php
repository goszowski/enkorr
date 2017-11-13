<?php
namespace App\Http\Composers\Indicator;

use Illuminate\Contracts\View\View;

class EuropeComposer
{
	protected $values;
	protected $oldValues;

  public function __construct()
  {
    $this->values = Model('indicator_value')->where('parent_id', 174)->orderBy('pubdate', 'desc')->take(3)->get();
    $this->oldValues = Model('indicator_value')->where('parent_id', 174)->where('pubdate', '<', $this->values->first()->pubdate->format('Y-m-d'))->orderBy('pubdate', 'desc')->take(3)->get();
  }

  public function compose(View $view)
  {
    $view->with('values', $this->values)->with('oldValues', $this->oldValues);
  }
}
