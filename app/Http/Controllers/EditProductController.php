<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Inventory;

class EditProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $uuid = $request->input('uuid');
        $inventory = Inventory::where('uuid',$request->input('uuid'))->first();
        $product_name = $inventory->product_name;
        $product = $inventory->product;
        $user_uuid = Auth::user()->uuid;
        return view('editProduct',compact('user_uuid','uuid','product_name','product'));
    }
}
