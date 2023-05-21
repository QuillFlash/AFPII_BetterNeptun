<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentControllerRequest;

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

    //Add Subject Index
    public function addSubjectIndex()
    {
        $subjects = DB::select('select * from subjects');
        return view('students.addSubject')->with('subjects', $subjects);
    }

    //Add Subjects
    public function addSubject(Request $request)
    {
        //Saving inputs into variables
        $subjectName = $request->input('subjectName');
        $subjectCode = $request->input('subjectCode');
        $room = $request->input('room');

        DB::table('subjects')->insert([
            'subjectName' => $subjectName,
            'subjectCode' => $subjectCode,
            'room' => $room
        ]);
        return view('students.addSubject');
    }

    public function listSubjectsIndex()
    {
        $subjects = DB::select('select * from subjects');
        return view('students.listSubjects')->with('subjects', $subjects);
    }

    //Assign student to subject
    public function assignStudentToSubject($id)
    {
        $subjects = DB::select('select * from subjects');
        //Getting the subjects id from the blade
        $currentUser = DB::table('current_user')->get()->last();

        $subjectId = DB::table('subjects')->where('id', $id)->first();
        $studentId = $currentUser->user_id;
        DB::table('assignments')->insert([
            'subjectId' => $subjectId->id,
            'studentId' => $studentId
        ]);
        return view('students.listSubjects', ['subjects' => $subjects]);
    }

    public function addGradeIndex()
    {
        return view('students.addGrade');
    }

    public function addGrade(Request $request)
    {
        $grade = $request->grade;
        $studentId = DB::table('users')->where('neptunCode', $request->neptunCode)->first();
        $subjectId = DB::table('subjects')->where('subjectName', $request->subjectName)->first();

        DB::table('grades')->insert([
            'grade' => $grade,
            'subjectId' => $subjectId->id,
            'studentId' => $studentId->id
        ]);
        return view('students.addGrade');
    }

    /*public function gradeAvarageIndex()
    {
        $currentUser = DB::table('current_user')->select()->get();
        $grades = 
        return view('students.listSubjects')->with('subjects', $subjects);
    }*/
}