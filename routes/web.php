<?php

use App\Http\Controllers\MenuController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['identify.menu'])->group(function () {
    Route::livewire('/menu/{menu}', 'pages::menu.show')->name('menuShow');
});