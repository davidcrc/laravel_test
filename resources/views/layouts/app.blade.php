<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel DC') }}</title>

    
    <!-- Styles -->
    {{-- Video 08: anandido bootstrap  --}}
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    
    {{--  Video 36: utilizando bootstrap localmente  --}}
    <link rel="stylesheet" href="{{mix('css/app.css')}} ">
</head>
<body>
    <div id="app" class="container" >
        <nav class="navbar navbar-light static-top navbar-toggleable-md bg-faded">
            <div class="container" >
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel DC') }}
                    {{--  Laravel DC   --}}
                </a> 

                {{--  <div class="collapse navbar-collapse" id="app-navbar-collapse"> IDENTIFICADO EL PROBLEMA DE NAVEGACION!!! --}}
                    <div class="nav navbar-collapse" >
                    <!-- Left Side Of Navbar - VIDEO 31: Buscador de mensajes--> 
                    <ul class="nav navbar-nav">
                        {{--  &nbsp;  --}}
                        <li class="nav-item">
                            <form action="/messages">
                                <div class="input-group"> 
                                    <input type="text" name="query" class="form-control" placeholder="Buscar..." required> 
                                    <span class="input-grupo-btn"> 
                                        <button class="btn btn-outline-success"> Buscar </button>
                                    </span>

                                </div>
                            </form>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav ml-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                            <li class="nav-item" ><a class="nav-link" href="{{ route('register') }}">Registrase</a></li>
                        @else
                            <!-- Video 41: Mostrar las notificaciones, solo cuando estas logueado -->
                            <li class="nav-item dropdown mr-2">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                    Notificaciones ({{ Auth::user()->notifications->count()}}) <span class="caret"></span>
                                </a>
                                
                                    <!-- vid 41: Dejara un vue, que escuche en tiempo real las notificaciones -->
                                    <notifications :user="{{Auth::user()->id }} "> </notifications>
                                
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class=" dropdown-menu" role="menu">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    
    {{--  Anandido en el video 16: autenticacion de usuarios  --}}
    {{--  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>  --}}
    
    {{--  bootstrap - video 8  --}}
    {{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  --}}
    
    {{--  Video 36: Quitado video8 y video 16  --}}
    <script src="{{mix('js/app.js')}} "> </script>
</body>
</html>