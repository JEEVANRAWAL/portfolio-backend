<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('aside', function (){
    return view('admin.layout.mainLayout');
});