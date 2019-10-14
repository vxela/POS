<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authLogin(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required|confirmed',
        ]);

        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/dashboard');
        // }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with(['error' => 'Password Invalid / Inactive Users']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}


$rules = array(
    'name'    => 'required',
);
