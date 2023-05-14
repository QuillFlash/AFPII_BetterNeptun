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
    <!--navbar-->
    <div>
        <button type="submit">Add Student</button>
        <button type="submit">Remove Student</button>
        <button type="submit">Update Student Informations</button>
    </div>

    <!--Students list-->
    {{$students}}
</body>
</html>
@endsection