@extends('layouts.app')

{{--  Video 27: Mostrar las conversaciones  --}}
@section('content')

    <h1>Conversación con {{ $conversation->users->except($user->id)->implode('name', ', ') }} </h1>

    @foreach($conversation->privateMessages as $message)        {{--  Video 27: Sus mensajes privados, cargados en la funcion PMS   --}}
	<div class="card">
    	
    	<div class="card-header">
    		{{--  {{$message->user->name }} dijo ...        [PROBLEMA CON $message->user->...]       --}}
    		{{$user->name }} dijo ... 
    	</div>
    	
    	<div class="card-block">	
    		{{$message->message}}
    	</div>
    	
    	<div class="card-footer">	
			{{$message->created_at}}
		</div>			
	    
    </div>
    @endforeach
@endsection