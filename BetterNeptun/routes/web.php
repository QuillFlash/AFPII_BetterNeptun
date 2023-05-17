<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
=======
use App\Http\Controllers\ListStudentsController;

Route::get('/', function ()
{
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login', [App\Http\Controllers\LoginController::class, 'loginIndex'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login oldal
Route::view('login','auth.login');
Route::post('login','App\Http\Controllers\RestoController@login');

//Admin oldal
Route::resource('students', StudentsController::class);
