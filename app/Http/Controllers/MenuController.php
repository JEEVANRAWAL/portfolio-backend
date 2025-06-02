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
}
