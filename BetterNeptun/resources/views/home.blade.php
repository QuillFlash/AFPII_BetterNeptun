@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-24" id="card_col">
            <div class="card w-75" id="messages">
                <div class="card-header">{{ __('Üzenetek') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('Lorem ipsum dolor sit amet') }}</li>
                        <li class="list-group-item">{{ __('Consectetur adipliscing elit') }}</li>
                        <li class="list-group-item">{{ __('Sed do eiusmod tempor incididunt ut labore') }}</li>
                        <li class="list-group-item">{{ __('Et dolore magna aliqua') }}</li>
                </ul>
                </div>
            </div>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
    <div class="container">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <h1>Home</h1>
            </div>
        </div>
    </div>
</body>
</html>
@endsection