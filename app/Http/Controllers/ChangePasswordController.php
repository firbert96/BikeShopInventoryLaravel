<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $uuid = Auth::user()->uuid;
        return view('changePassword',compact('uuid'));
    }
}
