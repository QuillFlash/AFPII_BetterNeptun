<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;



class RestoController extends Controller
{
    function login(Request $req)
    {
        $user = User::where('neptunCode',$req->input('neptunCode'))->get();
        if(($user[0]->password) == $req->input('password'))
        {
            $req->session()->put('user', $req->name);
            return redirect('/');
        }
    }
}