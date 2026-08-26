<?php

use App\Http\Controllers\Projects\Auth\AuthController;
use Illuminate\Support\Facades\{Route, Auth};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', function () {
    return view('Projects.Dashboard.index');
});

Route::group(['prefix' => 'admin'], function (){

    Route::group(['prefix' => '', 'as' => 'admin.', 'controller' => AuthController::class], function (){

        Route::GET('login', 'login')->name('login');
        Route::GET('register', 'register')->name('register');
        Route::GET('forgot_password', 'forgot_password')->name('forgot_password');

    });

});