<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MenuItemController extends Controller
{
    public function show($menuItem){
        if(request()->ajax()){
            $menuItems = MenuItem::where('menu_id', $menuItem)->orderBy('order_index', 'asc')->get();
            if($menuItems->isEmpty()){
                return response()->json(['message'=>'data not found for selected menu'], 404);
            }
            return response()->json(['message'=> 'data received sucessfully', 'data'=> $menuItems], 200);
        }

        return redirect()->back()->with(['message'=>'Requires ajax call to get data. Supports ajax call only.']);
    }
}
