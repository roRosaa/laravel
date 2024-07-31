<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login1(){
        return view('login');
    }

    public function login(Request $request){
        if($request->has('password')){
            if(Auth::guard('web')->attempt($request->only('email','password'))){
                return redirect()->intended('karyawan');
            }
        }
        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
