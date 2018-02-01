@extends('layouts.app')     {{--  Creando layouts , extends, section  --}}

@section('content')
    {{--  Video 08 : Cambia al proyecto real   --}}

    <div class="jumbotron text-center">
        <h1> Laravel DC </h1>

        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/"> Home </a>
                </li>

            </ul>
        </nav>
    </div> 

    {{--    --}}
    <div class="row" >
        <form action="/messages/create" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="message" class="form-control" placeholder="Que ta pensando??">
            </div>       
        </form>
    </div>

    {{--  video 8: desde aqui: cargan imagenes aleatorias  --}}
<div class="row" >
        @forelse($messages as $message)
            <div class="col-6" >
                <img class="img-thumbnail" src="{{ $message->image }}" > 
                    <p class="card-text" >
                        {{ $message->content }}
                        <a href="/messages/{{ $message->id }}" > Leer mas </a> {{-- por q /mesages ?? --}}
                        
                    </p>
            </div>
        @empty
            <p> No hay mensajes destacados </p>
        @endforelse
</div>
@endsection