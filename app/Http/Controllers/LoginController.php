<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authLogin(Request $request) {
        // dd($request->all());
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        else {
            return redirect('/login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
