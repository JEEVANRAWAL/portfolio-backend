<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('jeevan', function(){
    $this->comment('Jeevan Rawal is an inspiring Software Developer. Know more about jeevan '."www.jeevanrawal.com.np");
})->purpose('Introduction of the author');