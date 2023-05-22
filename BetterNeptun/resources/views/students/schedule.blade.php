@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedule</title>
</head>
<body>
    <div class="container">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right" style="color: white">
                <!--navbar-->
                <a href="gradeAvarage">Grade Avarage</a>
                <a href="listSubjects">List Subjects</a>
                <!-- Student list -->
                <div style="color: black">>
                    @foreach ($subjects as $sub)
                        <tr>
                            <td>{{$sub}}</td><br>
                        </tr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
</html>