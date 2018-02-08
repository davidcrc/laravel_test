@extends('layouts.app')

@section('content')
    <h1  class="h3" > Mensaje id: {{$message->id}} </h1>

    {{--  Video 18: Modificacion, para incluir archivo  --}}
    {{--  <img class="img-thumbnail" src=" {{$message->image}} ">
    <p class="card-text" >
        {{$message->content}}
        <small class="text-muted" > {{$message->created_at}} </small>
    </p>  --}}

    @include('messages.message')

    {{--  Video 38: Añadir un componente de Vue: Resources.assets.js.components  --}}
    <responses :message="{{$message->id}}"></responses>
@endsection

@section('title')
Id del mensaje
@endsection