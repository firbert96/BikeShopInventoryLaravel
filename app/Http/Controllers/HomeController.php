<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $fullname = Auth::user()->fullname;
        $email = Auth::user()->email;
        $input_search = $request->input_search;

        if(!isset($input_search)){
            $inventory = DB::table('inventory')->orderByRaw('updated_at DESC')->paginate(10);
        }
        else{       
            $inventory = DB::table('inventory')->where('product_name','like',"%".$input_search."%")->orderByRaw('updated_at DESC')->paginate(10);
        }
        return view('home',compact('fullname','email','inventory','input_search'));
        // return view('home',compact('fullname','email'));
    }
}
