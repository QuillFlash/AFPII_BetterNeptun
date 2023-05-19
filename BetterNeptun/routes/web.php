<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListStudentsController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('students', ListStudentsController::class);

//Login oldal
Route::view('login','auth.login');
Route::post('/login', [ListStudentsController::class, 'login']);

//Admin oldal
Route::view('index', 'students.index');
Route::get('/index', [ListStudentsController::class, 'index']);

//Add student oldal
Route::view('addstudent', 'students.addStudent');
Route::get('/addStudent', [ListStudentsController::class, 'addStudentIndex']);
Route::post('/addStudent', [ListStudentsController::class, 'create']);

//Remove student oldal
Route::view('removeStudent', 'students.removeStudent');
Route::get('/removeStudent', [ListStudentsController::class, 'listStudents']);
Route::get('delete/{id}', [ListStudentsController::class, 'removeStudent']);