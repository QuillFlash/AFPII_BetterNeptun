@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Subject</title>
</head>
<body>
    <!--Navigation to pages-->
    <div class="navbar">
        <a href="index">List Students</a>
        <a href="addStudent">Add Student</a>
        <a href="removeStudent">Remove Student</a>
        <a href="updateStudent">Update Student Informations</a>
        <a href="addGrade">Add Grade</a>
    </div>

    <!-- Validation fail -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Input card -->
    <div class="card">
        <div class="card-header">Add subject</div>
        <div class="card-body">
            @include('messages')
            <form action="{{ url('addStudent') }}" method="post">
              {!! csrf_field() !!}
              <label>Subject Name</label></br>
              <input type="text" name="subjectName" id="subjectName" class="form-control @error('subjectName') is-invalid @enderror" value="{{old('subjectName')}}"></br>
              @error('subjectName')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <label>Subject Code</label></br>
              <input type="text" name="subjectCode" id="subjectCode" class="form-control @error('subjectCode') is-invalid @enderror" value="{{old('subjectCode')}}"></br>
              @error('subjectCode')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <label>Room</label></br>
              <input type="text" name="room" id="room" class="form-control @error('room') is-invalid @enderror" value="{{old('room')}}"></br>
              @error('room')
              <span class="text-danger">
                  <strong>{{message}}</strong>
              </span>
                @enderror

              <input type="submit" value="Add Subject" class="btn btn-success"></br>
          </form>
        </div>
    </div>

    <!--Subject listing-->
    <div style="color: white">
    @foreach ($subjects as $sub)
        {{$sub->subjectName}}
        {{$sub->subjectCode}}
        {{$sub->Room}}
    @endforeach
    </div>
</body>
</html>
@endsection