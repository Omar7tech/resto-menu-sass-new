<?php

use App\Http\Controllers\MenuController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['identify.menu'])->group(function () {
    Route::livewire('/menu/{menu}', 'pages::menu.show')->name('menuShow');
    Route::livewire('/menu/{menu}/about', 'pages::menu.about')->name('menuAbout');
    Route::livewire('/menu/{menu}/contact', 'pages::menu.contact')->name('menuContact');
});