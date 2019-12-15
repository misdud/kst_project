<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <style>
    #company {
        font-size: 25px;
        font-family: Verdana;
        font-weight: bold;
        color: transparent;
        background: #666666;
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
        text-shadow: 0px 3px 3px rgba(255,255,255,0.5);
        }
     .wrapper {  
      display: inline-block;  
      width: 200px;  
      height: 100px;  
      vertical-align: top;  
      margin: 1em 1.5em 2em 0;  
      cursor: pointer;  
      position: relative;  
      font-family: Tahoma, Arial;  
      perspective: 4000px;  
    }  
      
    .item {  
      height: 100px;  
      transform-style: preserve-3d;  
      transition: transform .6s;  
    }
     .item img {  
      display: block;  
      position: absolute;  
      top: 0;  
      border-radius: 3px;  
      box-shadow: 0px 0px 0px rgba(0,0,0,0.3);  
      transform: translateZ(50px);  
      transition: all .6s;  
      
    }  
      
    .item .information {  
      display: block;  
      position: absolute;  
      top: 0;  
      height: 50px;  
      width: 250px;  
      text-align:center;  
      border-radius: 15px;  
      padding: 10px;  
      font-size: 12px;  
      box-shadow: none;  
      transform: rotateX(-90deg) translateZ(50px);  
      transition: all .8s;  
      
    }
     .item:hover {  
      transform: translateZ(-50px) rotateX(85deg);  
    }  
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('mylogin') }}">{{ __('Вход') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
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
            @yield('content')
        </main> 
    </div>
</body>
</html>
