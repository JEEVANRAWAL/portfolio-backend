<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus =  Menu::all();
        if(!$menus){
            return response()->view('admin.pages.menus.menu', ['error'=> 'data not found'], 404);
        }
        
        return response()->view('admin.pages.menus.menu', compact('menus'), 200);
    }

    public function updateOrder(Request $request){
        foreach($request->positions as $position){
            $menu = Menu::where('menu_name', $position['name'])->first();
            $menu->order_index = $position['position'];
            $menu->save();
        }
        return response()->json(['message'=> 'menu order updated sucessfully'], 200);
    }
}
