<?php

use Illuminate\Support\Facades\{Route, Auth};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', function () {
    return view('Projects.Dashboard.index');
});