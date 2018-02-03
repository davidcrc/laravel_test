@extends('layouts.app')

@section('content')

    <h1> {{$user->name}} </h1>
    {{--  Video 20: Link para poder seguir al usuario, mas una route::  --}}
    <form action="/{{$user->username}}/follow "  methot="post" >
        {{csrf_field()}}
        
        @if(session('success'))
            <span class="text-success" > {{session('success')}} </span>
        @endif
        <button class="btn btn-primary" > Follow  </button>
    </form>

    {{--  Video 19: muestra los mensajes de un determinado usuario  --}}
    <div class="row" >
        @foreach($user->messages as $message)
            <div class="col-6">
            @include('messages.message')
            </div>
        @endforeach
    </div>
@endsection