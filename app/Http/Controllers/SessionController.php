<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view('session.index');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username cannot be empty!',
            'password.required' => 'Password cannot be empty!'
        ]);

        $loginInfo = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($loginInfo)) {
            return redirect('/')->with('success', 'Welcome Back');
        } else {
            return redirect('session')->withErrors('Incorrect Username or Password!');
        }
    }
}
