<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentControllerRequest;
use App\Http\Requests\UpdateStudentControllerRequest;
use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ListStudentsController extends Controller
{
    function login(Request $req)
    {
        $user = User::where('neptunCode',$req->input('neptunCode'))->get()->first();
        if(($user->password) == $req->input('password'))
        {
            $req->session()->put('user', $req->name);
            if(($user->isAdmin) == 1)
            {
                $students = DB::select('select * from users');
                return view('students.index',['students' => $students]);
            }
            else
            {
                return view('home');
            }
        }
        else{
            return view('welcome');
        }
    }
    
    //Read
    public function index()
    {
        $students = DB::select('select * from users');
        return view('students.index')->with('students', $students);
    }

    //Create
    public function create(Request $request)
    {
        //Saving inputs into variables
        $username = $request->input('name');
        $neptunCode = $request->input('neptunCode');
        $pw = $request->input('password');
        $email = $request->input('email');
        $gradeId = $request->input('gradeId');

        DB::table('users')->insert([
            'name' => $username,
            'neptunCode' => $neptunCode,
            'email' => $email,
            'password' => $pw,
            'isAdmin' => 0,
            'gradeId' => $gradeId
        ]);
        return view('students.addStudent');
    }

    public function addStudentIndex()
    {
        return view('students.addStudent');
    }

    public function store(StudentControllerRequest $request)
    {
        User::create($request->validated());
        return back()->with('success','User Added Succesfully!');
    }

    public function updateStudentIndex()
    {
        $students = DB::select('select * from users');
        return view('students.updateStudent')->with('student', $students);
    }

    //Update
    public function updateStudent(Request $request)
    {
        if($request->newName != "" || $request->newNeptunCode != "")
        {
            DB::table('users')->where('neptunCode', $request->searchNCode)->update([
                'name' => $request->newName,
                'neptunCode' => $request->newNeptunCode
            ]);
            return redirect()->route('students.index')->with('success', 'Student information updated successfully.');
        }
        return redirect()->route('students.index')->with('error', 'There is no student with that neptun code.');
    }

    //Listing Existing Students
    public function listStudents()
    {
        $students = DB::select('select * from users');
        return view('students.removeStudent')->with('students', $students);
    }

    //Delete Students
    public function removeStudent($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect('removeStudent');
    }
}
