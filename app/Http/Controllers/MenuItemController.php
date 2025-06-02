<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function show($menuItem){
        if(Request::ajax()){

            $menuItems = MenuItem::where('menu_id', $menuItem)->get();
            if(!$menuItems){
                return response()->json(['error'=>'data not found for selected menu'], 404);
            }
    
            return response()->json( $menuItems, 200);
        }

        return redirect()->back()->with(['error'=>'Requires ajax call to get data. Supports ajax call only.']);
    }
}
