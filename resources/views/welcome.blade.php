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
        <form action="/messages/create" method="post" enctype="multipart/form-data">
            <div class="form-group @if($errors->has('message')) has-danger @endif" >
                {{csrf_field()}}
                <input type="text" name="message" class="form-control" placeholder="Que ta pensando??" required>
                @if($errors->any())
                    @foreach ($errors->get('message') as $error)
                        <div class="form-control-feedback" > {{$error}} </div>
                    @endforeach
                @endif
                {{--  Video 29: Subir achivos  --}}
                <input type="file" class="form-control-file" name="image">
            </div>       
        </form>
    </div>

    {{--  video 8: desde aqui: cargan imagenes aleatorias  --}}
<div class="row" >
        @forelse($messages as $message)
            {{--  Video 18: Se movio un mensaje a otro archivo : message  --}}
            <div class="col-6" >
               @include('messages.message')
            </div>
        @empty
            <p> No hay mensajes destacados </p>
        @endforelse

        {{--  Video 15: Paginacion  --}}
        @if(count($messages))
        <div class="mt-2 mx-auto" >
            {{$messages->links('pagination::bootstrap-4') }}
        </div>
        @endif
</div>
@endsection