@extends('layouts.app')

<link rel="stylesheet" href="css/no_navbar.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card bg-transparent">
                <div class="card-body align-items-center justify-content-start">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row col-sm-6 mb-3 d-flex align-items-center justify-content-center">
                            <i class="icon-user col-sm-4 col-form-label text-sm-end"></i>
                            <div class="col-sm-6">
                                <input id="neptunCode" type="text" placeholder="Neptun-kód" style="color:white;" class="form-control bg-transparent carousel-inner rounded-20 @error('neptunCode') is-invalid @enderror" name="neptunCode" value="{{ old('neptunCode') }}" required autocomplete="neptunCode" autofocus>
                                @error('neptunCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row col-sm-6 mb-3 d-flex align-items-center justify-content-center">
                            <i class="icon-key col-sm-4 col-form-label text-sm-end"></i>
                            <div class="col-sm-6">
                                <input id="password" type="password" placeholder="Jelszó" style="color:white;" class="form-control bg-transparent carousel-inner rounded-20 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-sm-12 d-flex form-check align-items-center justify-content-center">
                                    <input class="form-check-input bg-transparent rounded-pill" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-align-start" for="remember">
                                        {{ __('Jelszó megjegyzése') }}
                                    </label>
                                    <button type="submit" class="btn btn-primary rounded-20">
                                        {{ __('Bejelentkezés') }}
                                    </button>
                                </div>
                                <div class="col-sm-8">
                                    
                                </div>
                                <div class="col-sm-12 d-flex form-check align-items-center justify-content-center">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-align-center" href="{{ route('password.request') }}">
                                            {{ __('Elfelejtetted a jelszavad?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
