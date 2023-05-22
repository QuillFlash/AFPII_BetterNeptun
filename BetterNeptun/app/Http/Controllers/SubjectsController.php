<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentControllerRequest;
use PHPUnit\Framework\Constraint\Count;

class SubjectsController extends Controller
{
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
}