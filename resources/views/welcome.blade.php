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

    {{--  Video 13: Formulario q interactua con web.php -> create -> BD --}}
    <div class="row" >
        <form action="/messages/create" method="post">
            <div class="form-group @if($errors->has('message')) has-danger @endif" >
                {{csrf_field()}}
                <input type="text" name="message" class="form-control" placeholder="Que ta pensando??">
                @if($errors->any())
                    @foreach ($errors->get('message') as $error)
                        <div class="form-control-feedback" > {{$error}} </div>
                    @endforeach
                @endif
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