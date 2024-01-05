<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login succesfull')->header('Refresh', '3');
        }

        return back()->withErrors([
            'email' => 'The email or password you entered is incorrect.',
        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        //Auth::logoutOtherDevices($password);

        $request->session()->invalidate();

        //$request->session()->regerateToken();

        return redirect('/');
    }

}
