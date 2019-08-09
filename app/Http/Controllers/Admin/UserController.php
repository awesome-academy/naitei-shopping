<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Enums\Status;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view ('admin.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        
        return view ('admin.create.create_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRegisterRequest $req)
    {
        User::create([
            'name' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone_number' => $req->phone,
            'address' => $req->address,
            'city' => $req->city,
            'district' => $req->district,
            'status' => Status::Active,
            'role' => $req->role,
        ]);
        $message=  trans('admin_m_user.mes_create');
        $roles = Role::all();

        return view ('admin.create.create_user', compact('message', 'roles'));
    }

    public function findUser($id){
        
        return User::findOrFail($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->findUser($id);
        $roles = Role::all();
        
        return view ('admin.show.show_user', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->findUser($id);
        $roles = Role::all();
        
        return view ('admin.edit.edit_user', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditRequest $request, $id)
    {
        $user = $this->findUser($id);
        $user->update([
            'name' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'phone_number' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'status' => $request->status,
        ]);

        return redirect()->route('admin_user_show', $user->id)->with('status', trans('admin_m_user.mes_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->findUser($id)->delete();

        return redirect()->route('admin_user_index');
    }
}
