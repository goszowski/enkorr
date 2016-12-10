<?php
namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\RunsiteController;
use App\Mail\FeedBackRequest;
use App\Runsite\Libraries\Alert;
use Mail;


class ContactController extends RunsiteController
{
    public function view()
    {
      return $this->make_view('components.contact.contact');
    }

    public function sedRequest(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'email' => 'required|email',
        'title' => 'required|string|max:255',
        'message' => 'required|string|max:255',
      ]);

        $contact = Model('contact')->first();
        $emails = explode("\n", $contact->email);

        if(count($emails))
        {
          foreach($emails as $email) {
            Mail::to(trim($email))->send(new FeedBackRequest($request->input('name'), $request->input('email'), $request->input('text')));
          }
        }

        Alert::success(__('Thank you! Your message has been sent successfully'));
        return redirect()->back();
    }

}
