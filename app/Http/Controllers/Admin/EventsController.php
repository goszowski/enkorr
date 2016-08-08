<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Runsite\Event;

class EventsController extends Controller {

  public function index() {
    $events = Event::orderBy('created_at', 'desc')->paginate(30);
    return view('admin.events.index')->withEvents($events);
  }

}
