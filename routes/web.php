<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/add_user_index', [App\Http\Controllers\HomeController::class, 'add_user_index'])->name('add_user_index'); 
    Route::get('/add_user', [App\Http\Controllers\HomeController::class, 'add_user'])->name('add_user'); 
    Route::get('/rentals_index', [App\Http\Controllers\HomeController::class, 'rentals_index'])->name('rentals_index');     
    Route::post('/add_rental', [App\Http\Controllers\HomeController::class, 'add_rental'])->name('add_rental');     
    Route::get('get_invice/{id}', [App\Http\Controllers\HomeController::class, 'get_invice'])->name('get_invice');  
    Route::get('/expenses_index', [App\Http\Controllers\HomeController::class, 'expenses_index'])->name('expenses_index');            
});

