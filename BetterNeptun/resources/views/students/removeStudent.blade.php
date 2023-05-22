@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remove Student</title>
</head>
<body>
    <!--Navigation to pages-->
    <div class="navbar">
        <a href="index">List Students</a>
        <a href="addStudent">Add Student</a>
        <a href="updateStudent">Update Student Informations</a>
        <a href="addSubject">Add Subject</a>
        <a href="addGrade">Add Grade</a>
    </div>

    <!-- Student list -->
    <div style="color: white">>
    @foreach ($students as $std)
        <tr>
            <td>{{$std->id}}</td>
            <td>{{$std->name}}</td>
            <td>{{$std->neptunCode}}</td>
            <td>{{$std->email}}</td>
            <td><a href="{{"delete/".$std->id}}">Delete</a></td><br>
        </tr>
    @endforeach
    </div>
</body>
</html>
@endsection