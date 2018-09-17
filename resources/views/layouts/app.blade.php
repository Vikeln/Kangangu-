<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imagehover.min.css') }}" rel="stylesheet">
    <style>
    .hero-image {
height: 50%;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
}

.hero-text {
text-align: center;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
color: white;
}
.hero-text h1{
  color: white;
}
.hero-text button {
border: none;
outline: 0;
display: inline-block;
padding: 10px 25px;
color: green;
background-color: #ddd;
text-align: center;
cursor: pointer;
}

.hero-text button:hover {
background-color: #555;
color: white;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <a class="navbar-brand" href="{{ url('/') }}">
                          {{ config('app.name') }}
                      </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                          <li class="nav-item"><a class="nav-link" href="/#about">ABOUT US</a></li>
                          <li class="nav-item"><a class="nav-link" href="/#gallery">GALLERY</a></li>
                          <li class="nav-item"><a class="nav-link" href="/departments">DEPARTMENTS</a></li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                          <li class="nav-item"><a class="nav-link" href="/#about">ABOUT US</a></li>
                          <li class="nav-item"><a class="nav-link" href="/#gallery">GALLERY</a></li>
                          <li class="nav-item"><a class="nav-link" href="/departments">DEPARTMENTS</a></li>
                          <li class="nav-item"><a class="nav-link" href="/events">UPCOMING EVENTS</a></li>
                          <li class="nav-item btn-trial"><a class="nav-link" href="/academic">ACADEMICS</a></li>
                          <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
