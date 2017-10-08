<?php
namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class PollComposer
{
  protected $polls;

  public function __construct()
  {
    $this->polls = Model('poll')
                    ->orderBy('orderBy', 'asc')
                    ->limit(5)
                    ->get();
  }

  public function compose(View $view)
  {
    $view->with('polls', $this->polls);
  }
}
