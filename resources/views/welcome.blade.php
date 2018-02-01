@extends('layouts.app')     {{--  Creando layouts , extends, section  --}}

@section('content')
    <div class="title m-b-md">
        Laravel by <a href="http://www.asiesps.com"> DaviD </a>
    </div>

    {{--  Video 05  --}}
    @if(isset($teacher))
        <a> Profesor : {{$teacher}} </a>
    @else
            Profe a definir ...
    @endif

    <div class="links">
        
        @foreach ($linkss as $link => $text)
        <a href="{{ $link }}" > {{$text}} </a>
        @endforeach

    </div>

@endsection

{{-- 06 : Si no se define un yield('title'), entonces carga este de aqui  --}}

{{--  @section('title')
Laravel by David
@endsection  --}}