<?php

namespace App\Http\Controllers\System\Admin\login;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Login\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        //this function to showing login admin panel page
        return view('system.admin.pages.Login.index');
    }
    public function login(LoginRequest $request)
    {
        //this function to login user to admin panel
        if(Auth::guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('errorMsg','البيانات غير صحيحة');
    }

    public function logoutManager()
    {
        //this function to logout user from admin panel
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
