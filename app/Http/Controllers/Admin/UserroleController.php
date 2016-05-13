<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserRole;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UserroleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $userroles = UserRole::paginate(15);

        return view('userroles.index', compact('userroles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('userroles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        UserRole::create($request->all());

        Session::flash('flash_message', 'UserRole added!');

        return redirect('userrole');
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
        $userrole = UserRole::findOrFail($id);

        return view('userroles.show', compact('userrole'));
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
        $userrole = UserRole::findOrFail($id);

        return view('userroles.edit', compact('userrole'));
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

        $userrole = UserRole::findOrFail($id);
        $userrole->update($request->all());

        Session::flash('flash_message', 'UserRole updated!');

        return redirect('userrole');
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
        UserRole::destroy($id);

        Session::flash('flash_message', 'UserRole deleted!');

        return redirect('userrole');
    }

}
