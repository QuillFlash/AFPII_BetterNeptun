@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Grade</title>
</head>
<body>
    <!--Navigation to pages-->
    <div class="navbar">
        <a href="index">List Students</a>
        <a href="addStudent">Add Student</a>
        <a href="removeStudent">Remove Student</a>
        <a href="updateStudent">Update Student Informations</a>
        <a href="addSubject">Add Subject</a>
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
        <div class="card-header">Add grade</div>
        <div class="card-body">
            @include('messages')
            <form action="{{ url('addGrade') }}" method="post">
              {!! csrf_field() !!}
              <label>Subject Name</label></br>
              <input type="text" name="subjectName" id="subjectName" class="form-control @error('subjectName') is-invalid @enderror" value="{{old('subjectName')}}"></br>
              @error('subjectName')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <label>Grade</label></br>
              <input type="number" name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror" value="{{old('grade')}}"></br>
              @error('grade')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <label>Neptun Code</label></br>
              <input type="text" name="neptunCode" id="neptunCode" class="form-control @error('neptunCode') is-invalid @enderror" value="{{old('neptunCode')}}"></br>
              @error('neptunCode')
              <span class="text-danger">
                  <strong>{{message}}</strong>
              </span>
                @enderror

              <input type="submit" value="Save" class="btn btn-warning"></br>
          </form>
        </div>
      </div>
</body>
</html>
@endsection