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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListStudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\TimetableController;

Route::get('/', function ()
{
    return view('login');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('students', ListStudentsController::class);

//Login oldal
Route::view('login','auth.login');
Route::post('/login', [LoginController::class, 'login']);

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

//Add subject oldal
Route::view('addSubject', 'students.addSubject');
Route::get('/addSubject', [SubjectsController::class, 'addSubjectIndex']);
Route::put('/addSubject', [SubjectsController::class, 'addSubject']);

//Student oldal
Route::view('listSubjects', 'students.listSubjects');
Route::get('/listSubjects', [SubjectsController::class, 'listSubjectsIndex']);
Route::get('assign/{id}', [SubjectsController::class, 'assignStudentToSubject']);

//Add grade oldal
Route::view('addGrade', 'students.addGrade');
Route::get('/addGrade', [GradeController::class, 'addGradeIndex']);
Route::post('/addGrade', [GradeController::class, 'addGrade']);

//Grade avarage oldal
Route::view('gradeAvarage', 'students.gradeAvarage');
Route::get('/gradeAvarage', [GradeController::class, 'gradeAvarageIndex']);

//Schedule oldal
Route::view('timetable', 'students.timetable');
Route::get('/timetable', [TimetableController::class, 'timetable']);