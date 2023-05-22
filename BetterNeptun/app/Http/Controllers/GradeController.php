<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentControllerRequest;
use PHPUnit\Framework\Constraint\Count;

class GradeController extends Controller
{
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

    public function gradeAvarageIndex()
    {
        $currentUser = DB::table('current_user')->get()->last();
        $studentId = $currentUser->user_id;
        $grades = DB::table('grades')->where('studentId', $studentId)->get();
        $avg = 0;
        for ($i=0; $i < count($grades); $i++) { 
            $avg += $grades[$i]->grade;
        }
        $remainder = $avg % count($grades);
        $quotient = ($avg - $remainder) / count($grades);
        $avg = $quotient.'.'.$remainder;

        return view('students.gradeAvarage')->with('avg', $avg);
    }
}