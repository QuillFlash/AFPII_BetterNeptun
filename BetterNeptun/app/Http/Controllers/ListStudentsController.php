<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ListStudentsController extends Controller
{
    //Read
    public function index()
    {
        return view('students.index');
    }

    public function addStudent()
    {
        return view('students.addStudent');
    }

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

    public function store(Request $request) : RedirectResponse
    {
        $input = $request->all();
        User::create($input);
        return redirect('addStudent')->with('flash_message', 'Student added!');
    }

    public function edit(string $id)
    {
        //
    }

    //Update
    public function update(Request $request, string $id)
    {
        //
    }

    public function removeStudent()
    {

        return view('students.removeStudent');
    }
}
