@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
</head>
<body>
    <!--Navigation to <pages-->
    <div class="navbar">
        <a href="addStudent">Add Student</a>
        <a href="removeStudent">Remove Student</a>
        <a href="update_student">Update Student Informations</a>
    </div>

    <!--Student listing-->
    @foreach ($students as $std)
        {{$std->name}} <!--Student name from database-->
        {{$std->neptunCode}} <!--Student netptunCode from database-->
        {{$std->email}} <!--Student email from database-->
    @endforeach
</body>
</html>
@endsection