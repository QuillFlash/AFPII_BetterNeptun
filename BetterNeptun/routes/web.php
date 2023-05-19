<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListStudentsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login oldal
Route::view('login','auth.login');
Route::post('login','App\Http\Controllers\RestoController@login');

//Admin oldal
Route::get('/students', [ListStudentsController::class, 'index']);
Route::get('/addStudent', [ListStudentsController::class, 'addStudent']);
Route::post('/addStudent', [ListStudentsController::class, 'create']);
Route::get('/removeStudent', [ListStudentsController::class, 'removeStudent']);