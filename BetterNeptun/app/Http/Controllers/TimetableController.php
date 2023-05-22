<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentControllerRequest;
use PHPUnit\Framework\Constraint\Count;

class TimetableController extends Controller
{
    public function timetable()
    {
        $currentUser = DB::table('current_user')->get()->last();
        $studentId = $currentUser->user_id;

        $assignments = DB::table('assignments')->where('studentId', $studentId)->get();
        $subjects = array();
        for ($i=0; $i < count($assignments); $i++)
        {
            $subject = DB::table('subjects')->where('id', $assignments[$i]->subjectId)->get();
            for ($j=0; $j < count($subject); $j++)
            {
                $subjectName = $subject[$j]->subjectName;
                array_push($subjects, $subjectName);
            }
        }
        return view('students.timetable')->with('subjects', $subjects);
    }
}