@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Information</title>
</head>
<body>
    <!--Navigation to pages-->
    <div class="navbar">
        <a href="index">List Students</a>
        <a href="addStudent">Add Student</a>
        <a href="removeStudent">Remove Student</a>
    </div>

    <!-- Input card -->
    <div class="card">
        <div class="card-header">Update Student Information</div>
        <div class="card-body">
            @include('messages')
            <form action="{{ url('updateStudent') }}" method="post">
              {!! csrf_field() !!}
              @method("put")
              <label>Name</label></br>
              <input type="text" name="name" id="name" class="form-control"></br>
              <label>Neptun Code</label></br>
              <input type="text" name="neptunCode" id="neptunCode" class="form-control"></br>
              <input type="submit" value="Save" class="btn btn-success"></br>
          </form>
        </div>
      </div>
</body>
</html>
@endsection