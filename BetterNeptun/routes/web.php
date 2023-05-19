<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListStudentsController;

Route::get('/', function ()
{
    return view('home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('students', ListStudentsController::class);

//Login oldal
Route::view('login','auth.login');
Route::post('/login', [ListStudentsController::class, 'login']);

//Add student oldal (CRUD - Create)
Route::view('addstudent', 'students.addStudent');
Route::get('/addStudent', [ListStudentsController::class, 'addStudentIndex']);
Route::post('/addStudent', [ListStudentsController::class, 'create']);

//Admin oldal (CRUD - Read)
Route::view('index', 'students.index');
Route::get('/index', [ListStudentsController::class, 'index']);

//Update student oldal (CRUD - Update)
Route::view('updateStudent', 'students.updateStudent');
Route::get('/updateStudent', [ListStudentsController::class, 'updateStudentIndex']);
Route::put('/updateStudent', [ListStudentsController::class, 'updateStudent']);

//Remove student oldal (CRUD - Delete)
Route::view('removeStudent', 'students.removeStudent');
Route::get('/removeStudent', [ListStudentsController::class, 'listStudents']);
Route::get('delete/{id}', [ListStudentsController::class, 'removeStudent']);