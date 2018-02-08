@extends('layouts.app')

@section('content')
    
    <h1> {{$user->name}} </h1>
    {{--  parte 2 - video 21  --}}
    <a href="{{$user->username}}/follows" class="btn btn-link"> 
        Sigue a : <span class="badge badge-primary" >  {{$user->follows->count()}} usuarios.</span>
    </a>
    <a href="{{$user->username}}/followers" class="btn btn-link"> 
        Seguidores : <span class="badge badge-primary" >  {{$user->followers->count()}} usuarios.</span>
    </a>    

{{--  Video 21: Dejar de seguir a otro usuario  --}}
@if(Auth::check())

    @if(Gate::allows('dms',$user))  {{--  video 26 - añadido este formulario, para enviar mensajes si sigo y me sigue, y la regla Gate  --}}
    <form action="/{{$user->username}}/dms" method="post">
        {{csrf_field()}}
            
        <input type="text" name="message" class="form-control">
            <button type="submit" class="btn btn-success">
                Enviar DM
            </button>    
    </form>
    @endif

    @if(Auth::user()->isFollowing($user) )     {{--  si sigo a este usuario  --}}
    <form action="/{{$user->username}}/unfollow"  methot="get" >
        {{csrf_field()}}
        
        @if(session('success'))
        <span class="text-success" > {{session('success')}} </span>
        @endif
        <button class="btn btn-danger" > Dejar de seguir  </button>
    </form>
    
    @else
    {{--  Video 20: Link para poder seguir al usuario, mas una route::  --}}
    <form action="/{{$user->username}}/follow"  methot="get" >
        {{csrf_field()}}
        
        @if(session('success'))
        <span class="text-success" > {{session('success')}} </span>
        @endif
        <button class="btn btn-primary" > Seguir  </button>
    </form>
    @endif
@endif
    {{--  Video 19: muestra los mensajes de un determinado usuario  --}}
    <div class="row" >
        @foreach($user->messages as $message)
            <div class="col-6">
            @include('messages.message')
            </div>
        @endforeach
    </div>
@endsection