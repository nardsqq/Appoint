<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Even Man Production - BMS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Even Man Productions - BMS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    @if(Auth::user()->role == 1)
                                    <a class="dropdown-item" href="{{ url('/resume/create') }}">
                                        Upload Resume
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            <div class="container">
                @if(Auth::user()->role == 0)
                    <nav class="nav">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        <a class="nav-link" href="{{ url('/clients') }}">Clients</a>
                        <a class="nav-link" href="{{ url('/event-types') }}">Event Types</a>
                        <a class="nav-link" href="{{ url('/events') }}">Events</a>
                        <a class="nav-link" href="{{ url('/bookings') }}">Bookings</a>
                        <a class="nav-link" href="{{ url('/performers') }}">Performers</a>
                    </nav>
                @elseif(Auth::user()->role == 1)
                    <nav class="nav">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        <a class="nav-link" href="{{ url('/events') }}">Events</a>
                        <a class="nav-link" href="{{ url('/bookings') }}">My Bookings</a>
                    </nav>
                @endif
                <section class="row justify-content-center">
                    <section class="col-md-12">
                        <div class="shadow-sm p-3 mb-3 mt-4 bg-white rounded">
                            @yield('page-info')
                        </div>
                    </section>
                    @yield('content')
                </section>
            </div>
        </main>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
