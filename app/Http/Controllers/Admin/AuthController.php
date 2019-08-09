<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\User;
use App\Enums\Role;
use App\Enums\Status;
use App\Http\Requests\AdminLoginRequest;

class AuthController extends Controller
{
    public function index(){
        
        return view ('admin.login');
    }

    public function login(AdminLoginRequest $req){
        if (Auth::attempt([ 'email' => $req->email, 'password' => $req->password ])) 
        {
            return redirect()->route('admin_dashboard_index');
        }
        $err = trans('admin_auth.err_login');

        return view('admin.login', compact('err'));
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('admin_login_index');
    }
}
