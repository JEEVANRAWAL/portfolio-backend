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
    Route::get('menu', [MenuController::class, 'index'])->name('Menu');
    Route::get('menu/{menuItem}/menuItem', [MenuItemController::class, 'show'])->name('showMenuITems');
    Route::post('menu/{menuItem}/menuItem', [MenuItemController::class, 'store'])->name('storeMenuItem');
    Route::post('menu/menuItem/updateOrder', [MenuItemController::class, 'updateOrder'])->name('updateMenuItemOrder');
    Route::post('mainMenu/updateOrder', [MenuController::class, 'updateOrder'])->name('updateMainMenuOrder');

    Route::post('menu', [MenuController::class, 'store'])->name('store');
});