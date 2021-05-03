<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Gate;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('superadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users=User::with('roles')->get();
        return view('superadmin/users.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('superadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles=Role::all();
        return view('superadmin/users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('superadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = new User;
        $user->name=request('name');
        $user->email=request('email');

        $user->password=Hash::make(request('password'));
        $user->save();
        $user->roles()->sync(request('roles'));
        return redirect('/superadmin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('superadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('superadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
