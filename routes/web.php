<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('aside', function (){
    return view('admin.layouts.mainLayout');
});

// Route::get('menu', function(){
//     return view('admin.pages.menus.menu');
// });
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('menu', [MenuController::class, 'index'])->name('getMenu');
    Route::get('menu/{menuItem}/menuItem', [MenuItemController::class, 'show'])->name('showMenuITems');
});