<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            return response()->json('Login successful',200);
        } 
        return response()->json('Login failed, username or password is wrong',422);
    }

    public function logOut(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
