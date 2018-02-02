 <img class="img-thumbnail" src="{{ $message->image }}" > 
 <p class="card-text" >
    <div class=="text-muted" > Escrito por: 
        <a href="/{{$message->user->username}} " >
            {{$message->user->name}} 
        </a >
    </div>
    {{ $message->content }}
    <a href="/messages/{{ $message->id }}" > Leer mas </a>

    {{--  Video 19: fechas de creacion del mensaje  --}}

    <div class="card-text text-muted float-right" >
        {{$message->created_at}}
    </div>
</p>