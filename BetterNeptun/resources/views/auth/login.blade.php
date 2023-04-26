@extends('layouts.app')

<link rel="stylesheet" href="css/no_navbar.css">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-transparent" id="login_card">
                <div class="card-body align-items-center justify-content-start">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row col-lg-6 mb-3 d-flex align-items-center justify-content-center">
                            <i class="icon-user col-lg-4 col-form-label text-lg-end"></i>
                            <div class="col-lg-6 align-items-center justify-content-center">
                                <input id="neptunCode" type="text" placeholder="Neptun-kód" style="color:white;" class="flexbox-gap form-control bg-transparent carousel-inner rounded-20 @error('neptunCode') is-invalid @enderror" name="neptunCode" value="{{ old('neptunCode') }}" required autocomplete="neptunCode" autofocus>
                                @error('neptunCode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row col-lg-6 mb-3 d-flex align-items-start justify-content-center">
                            <i class="icon-key col-lg-4 col-form-label text-lg-end"></i>
                            <div class="col-lg-6 align-items-center justify-content-center">
                                <input id="password" type="password" placeholder="Jelszó" style="color:white;" class="flexbox-gap form-control bg-transparent carousel-inner rounded-20 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12 my-4 d-flex form-check align-items-center justify-content-center">
                            <input class="form-check-input bg-transparent rounded-pill" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-align-center" for="remember">
                                {{ __('Jelszó megjegyzése') }}
                            </label>
                        </div>
                        <div class="col-xl-12 my-4 d-flex form-check align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary rounded-20 align-items-center justify-content-center">
                                {{ __('Bejelentkezés') }}
                            </button>
                        </div>

                        <div class="col-lg-24 m-4 d-flex form-check align-items-center justify-content-center" id="reminder">
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
