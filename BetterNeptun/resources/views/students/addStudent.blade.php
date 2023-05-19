@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
</head>
<body>
    <!--Navigation to pages-->
    <div class="navbar">
        <a href="index">List Students</a>
        <a href="removeStudent">Remove Student</a>
        <a href="update_student">Update Student Informations</a>
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
        <div class="card-header">Add student</div>
        <div class="card-body">
            @include('messages')
            <form action="{{ url('addStudent') }}" method="post">
              {!! csrf_field() !!}
              <label>Name</label></br>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"></br>
              @error('name')
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

              <label>Password</label></br>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}"></br>
              @error('password')
              <span class="text-danger">
                  <strong>{{message}}</strong>
              </span>
                @enderror

              <label>Email</label></br>
              <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"></br>
              @error('email')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <label>Grade id</label></br>
              <input type="number" name="gradeId" id="gradeId" class="form-control @error('gradeId') is-invalid @enderror" value="{{old('gradeId')}}"></br>
              @error('gradeId')
                <span class="text-danger">
                    <strong>{{message}}</strong>
                </span>
              @enderror

              <input type="submit" value="Save" class="btn btn-success"></br>
          </form>
        </div>
      </div>
</body>
</html>
@endsection