<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentControllerRequest;
use PHPUnit\Framework\Constraint\Count;

class ListStudentsController extends Controller
{
    function login(Request $req)
    {
        $user = User::where('neptunCode',$req->input('neptunCode'))->get()->first();
        if(($user->password) == $req->input('password'))
        {
            if(($user->isAdmin) == 1)
            {
                DB::table('current_user')->insert([
                    'name' => $user->name,
                    'neptunCode' => $user->neptunCode,
                    'email' => $user->email,
                    'password' => $user->password,
                    'isAdmin' => $user->isAdmin,
                    'user_id' => $user->id
                ]);
                $students = DB::select('select * from users');
                return view('students.index',['students' => $students, 'currentUser' => $user]);
            }
            else
            {
                DB::table('current_user')->insert([
                    'name' => $user->name,
                    'neptunCode' => $user->neptunCode,
                    'email' => $user->email,
                    'password' => $user->password,
                    'isAdmin' => $user->isAdmin,
                    'user_id' => $user->id
                ]);
                $subjects = DB::select('select * from subjects');
                return view('students.listSubjects', ['subjects' => $subjects, 'currentUser' => $user]);
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

        DB::table('users')->insert([
            'name' => $username,
            'neptunCode' => $neptunCode,
            'email' => $email,
            'password' => $pw,
            'isAdmin' => 0
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