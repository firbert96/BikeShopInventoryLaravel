<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $uuid = Auth::user()->uuid;
        $fullname = Auth::user()->fullname;
        $email = Auth::user()->email;
        $phone = Auth::user()->phone;
        return view('editUser',compact('uuid','fullname','email','phone'));
    }
}
