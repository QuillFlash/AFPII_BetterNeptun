<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RestoController extends Controller
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
}