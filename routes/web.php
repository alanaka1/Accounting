<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\Projects\Auth\AuthController;
use App\Http\Controllers\Projects\Accounting\{CurrencyController, CategoryController, CurrencyTransferController, TransactionController};

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
            Route::get('/', 'index')->name('index');                        // accounting.currencies.index
            Route::get('create', 'create')->name('create');                 // accounting.currencies.create
            Route::post('store', 'store')->name('store');                   // accounting.currencies.store
            Route::get('trash', 'trash')->name('trash');                    // accounting.currencies.trash
            Route::get('{id}/edit', 'edit')->name('edit');                  // accounting.currencies.edit
            Route::put('{id}/update', 'update')->name('update');            // accounting.currencies.update
            Route::delete('{id}/destroy', 'destroy')->name('destroy');      // accounting.currencies.destroy
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.currencies.status
        });
        
        /************************************************** Categories **************************************************/
        Route::group(['prefix' => 'categories', 'as' => 'categories.', 'controller' => CategoryController::class], function () {

            Route::get('/', 'index')->name('index');                        // accounting.categories.index
            Route::get('create', 'create')->name('create');                 // accounting.categories.create
            Route::post('store', 'store')->name('store');                   // accounting.categories.store
            Route::get('trash', 'trash')->name('trash');                    // accounting.categories.trash
            Route::get('{id}/edit', 'edit')->name('edit');                  // accounting.categories.edit
            Route::put('{id}/update', 'update')->name('update');            // accounting.categories.update
            Route::delete('{id}/destroy', 'destroy')->name('destroy');      // accounting.categories.destroy
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.categories.status
        });
    
        /************************************************** Currency Transfers **************************************************/
        Route::group(['prefix' => 'currency-transfers', 'as' => 'currency-transfers.', 'controller' => CurrencyTransferController::class], function () {
            Route::get('/', 'index')->name('index');                        // accounting.currency-transfers.index
            Route::get('create', 'create')->name('create');                 // accounting.currency-transfers.create
            Route::post('store', 'store')->name('store');                   // accounting.currency-transfers.store
            Route::get('trash', 'trash')->name('trash');                    // accounting.currency-transfers.edit
            Route::get('{id}/edit', 'edit')->name('edit');                  // accounting.currency-transfers.update
            Route::put('{id}/update', 'update')->name('update');            // accounting.currency-transfers.destroy
            Route::delete('{id}/destroy', 'destroy')->name('destroy');      // accounting.currency-transfers.status
            Route::patch('{id}/status', 'updateStatus')->name('status');    // accounting.currency-transfers.trash
        });

        /************************************************** Transactions **************************************************/

        Route::group(['prefix' => 'transactions', 'as' => 'transactions.', 'controller' => TransactionController::class], function () {
            Route::get('/', 'index')->name('index');                        /* accounting.transactions.index */
            Route::get('create', 'create')->name('create');                 /* accounting.transactions.create */
            Route::post('store', 'store')->name('store');                   /* accounting.transactions.store */
            Route::get('trash', 'trash')->name('trash');                    /* accounting.transactions.trash */
            Route::get('{id}/edit', 'edit')->name('edit');                  /* accounting.transactions.edit */
            Route::put('{id}/update', 'update')->name('update');            /* accounting.transactions.update */
            Route::delete('{id}/destroy', 'destroy')->name('destroy');      /* accounting.transactions.destroy */
            Route::patch('{id}/status', 'updateStatus')->name('status');    /* accounting.transactions.status */

            /* index - create - store - edit -update -destroy */
            // Route::resource('transactions', TransactionController::class)->except('show'); 
        });

    });

});