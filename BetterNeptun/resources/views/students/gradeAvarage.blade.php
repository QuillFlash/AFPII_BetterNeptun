@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grade Avarage</title>
</head>
<body>
    <div class="container">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right" style="color: white">
                <!--navbar-->
                <a href="listSubjects">List Subjects</a>
                <a href="schedule">Schedule</a>
                <!-- Student list -->
                <div style="color: white">>
                    <h1>Your avarage is: {{$avg}}</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
</html>