<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MenuItemController extends Controller
{
    public function show($menuItemId){
        if(request()->ajax()){
            $type = request()->type;
            if($type == 'menuItems'){
                $menuItems = MenuItem::where('menu_id', $menuItemId)->whereNull('parent_menu_item_id')->orderBy('order_index', 'asc')->get();
                if($menuItems->isEmpty()){
                    return response()->json(['message'=>'data not found for selected menu'], 404);
                }
                return response()->json(['message'=> 'data received sucessfully', 'data'=> $menuItems], 200);
            } elseif($type == 'subMenuItems'){
                $subMenuItems = MenuItem::where('parent_menu_item_id', $menuItemId)->orderBy('order_index', 'asc')->get();
                if($subMenuItems->isEmpty()){
                    return response()->json(['message'=>'data not found for selected menu'], 404);
                }
                return response()->json(['message'=> 'data received sucessfully', 'data'=> $subMenuItems], 200);
            }
        }

        return redirect()->back()->with(['message'=>'Requires ajax call to get data. Supports ajax call only.']);
    }
}
