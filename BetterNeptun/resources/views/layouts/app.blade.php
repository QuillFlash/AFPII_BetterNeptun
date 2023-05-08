<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BetterNeptun</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-transparent" id="transNav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BetterNeptun
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-toggler" href="{{ url('/+rarend') }}">
                            BetterNeptun
                        </a>
                        <li><a name="timetable" class="nav-link" href="{{ url('/timetable') }}">Órarend</a></li>
                        <li><a name="succession" class="nav-link" href="{{ url('/succession') }}">Előrehaladás</a></li>
                        <li><a name="subjects" class="nav-link" href="{{ url('/subjects') }}">Tárgyak</a></li>

                        @if(Route::is('timetable'))
                            <style>
                                a[name="timetable"]
                                {
                                    background-color: #0B4246;
                                    border-radius: 5%;
                                }
                            </style>
                        @endif

                        @if(Route::is('succession'))
                            <style>
                                a[name="succession"]
                                {
                                    background-color: #0B4246;
                                    border-radius: 5%;
                                }
                            </style>
                        @endif

                        @if(Route::is('subjects'))
                            <style>
                                a[name="subjects"]
                                {
                                    background-color: #0B4246;
                                    border-radius: 5%;
                                }
                            </style>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Kijelentkezés') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
