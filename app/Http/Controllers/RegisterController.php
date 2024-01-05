<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',['title' => 'Register']);
    }

    public function registeruser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:25|min:6|unique:users',
            'password' => 'required|min:6|max:25'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registration successfull! Please login');

        return redirect('/login');
    }
}
