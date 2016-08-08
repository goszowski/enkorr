<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Event;

class EventsController extends Controller {

  public function index($user_id = false) {
    $events = Event::orderBy('created_at', 'desc');
    if($user_id)
    {
      $events = $events->where('user_id', $user_id);
    }
    $events = $events->paginate(30);
    return view('admin.events.index')->withEvents($events);
  }


  public function user($id) {
    return $this->index($id);
  }

}
