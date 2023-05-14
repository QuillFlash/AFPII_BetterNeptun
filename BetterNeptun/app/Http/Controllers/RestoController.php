<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
                return view('/students.index');
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