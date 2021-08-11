<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Inventory;
use App\Inventory_flows;

class InventoryFlowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $fullname = Auth::user()->fullname;
        $email = Auth::user()->email;
        return view('inventoryFlows',compact('fullname','email'));
    }
}
