<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Runsite\Notify;
use App\Runsite\NotifyUser;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class NotifyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $messages = Notify::orderBy('id', 'desc')->paginate(15);

        return view('admin.notify.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.notify.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Notify::create($request->all());

        Session::flash('flash_message', 'Notify added!');

        return redirect('panel-admin/notify');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = Notify::findOrFail($id);
        NotifyUser::create([
          'user_id' => Auth::user()->id,
          'notification_id' => $message->id,
        ]);

        return view('admin.notify.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = Notify::findOrFail($id);;

        return view('admin.notify.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        $message = Notify::findOrFail($id);
        $message->update($request->all());

        Session::flash('flash_message', 'Notify updated!');

        return redirect('panel-admin/notify');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Notify::destroy($id);

        Session::flash('flash_message', 'Notify deleted!');

        return redirect('panel-admin/notify');
    }


    public function last(Notify $notify)
    {
      $messages = $notify->getMessages();
      return response()->json($messages->toArray());
    }

    public function cnt(Notify $notify)
    {
      $messages = $notify->doesntHave('userViews')->count();
      return response()->json($messages);
    }

}
