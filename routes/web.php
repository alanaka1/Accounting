<?php

use App\Http\Controllers\Project\Accounting\{CurrencyController, CategoryController, CurrencyTransferController};
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

    Route::group(['prefix' => 'accounting', 'as' => 'accounting.', 'middleware' => 'auth'], function (){
    
        /************************************************** Currencies **************************************************/
        Route::group(['prefix' => 'currencies', 'as' => 'currencies.', 'controller' => CurrencyController::class], function (){
            Route::get('/', 'index')->name('index');    // accounting.currencies.index
            Route::get('create', 'create')->name('create'); // accounting.currencies.create
            Route::post('store', 'store')->name('store');   // accounting.currencies.store
            Route::get('{id}/edit', 'edit')->name('edit');  // accounting.currencies.edit
            Route::put('{id}/update', 'update')->name('update');    // accounting.currencies.update
            Route::delete('{id}/destroy', 'destroy')->name('destroy');  // accounting.currencies.destroy
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.currencies.status
            Route::get('trash', 'trash')->name('trash');    // accounting.currencies.trash
        });
        
        /************************************************** Categories **************************************************/
        Route::group(['prefix' => 'categories', 'as' => 'categories.', 'controller' => CategoryController::class], function () {
            Route::get('/', 'index')->name('index');    // accounting.categories.index
            Route::get('create', 'create')->name('create'); // accounting.categories.create
            Route::post('store', 'store')->name('store');   // accounting.categories.store
            Route::get('{id}/edit', 'edit')->name('edit');  // accounting.categories.edit
            Route::put('{id}/update', 'update')->name('update');    // accounting.categories.update
            Route::delete('{id}/destroy', 'destroy')->name('destroy');  // accounting.categories.destroy
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.categories.status
            Route::get('trash', 'trash')->name('trash');    // accounting.categories.trash
        });
    
        /************************************************** Currency Transfers **************************************************/
        Route::group(['prefix' => 'currency-transfers', 'as' => 'currency-transfers.', 'controller' => CurrencyTransferController::class], function () {
            Route::get('/', 'index')->name('index');    // accounting.currency-transfers.index
            Route::get('create', 'create')->name('create'); // accounting.currency-transfers.create
            Route::post('store', 'store')->name('store');   // accounting.currency-transfers.store
            Route::get('trash', 'trash')->name('trash');    // accounting.currency-transfers.edit
            Route::get('{id}/edit', 'edit')->name('edit');  // accounting.currency-transfers.update
            Route::put('{id}/update', 'update')->name('update');    // accounting.currency-transfers.destroy
            Route::delete('{id}/destroy', 'destroy')->name('destroy');  // accounting.currency-transfers.status
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.currency-transfers.trash
        });

    });

});