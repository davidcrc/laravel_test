@extends('layouts.app')

@section('content')

    {{--  <h1> {{$user->name}} </h1>  --}}

    {{--  @foreach($user->follows as $follow)  -- Cambiado en l video 21, mas estilos--}}
    <ul class="list-unstyled" > 
    @foreach($follows as $follow)
    
        <li> {{$follow->username}} </li>
    @endforeach
    
@endsection