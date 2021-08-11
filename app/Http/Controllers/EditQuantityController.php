<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditQuantityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $inventory_uuid = $request->input('uuid');
        $user_uuid = Auth::user()->uuid;
        return view('editQuantity',compact('user_uuid','inventory_uuid'));
    }
}
