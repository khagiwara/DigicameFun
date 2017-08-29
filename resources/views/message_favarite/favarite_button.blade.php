{{--
<div>$favarite_button.blade.php</div>
{{ $user }}
{{ Auth::User() }}
--}}

    @if (Auth::user()->is_favariting($message->id))
        {!! Form::open(['route' => ['message.unfavarite', $message->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入りにから外す', ['class' => "btn btn-danger btn-block"]) !!} 
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['message.favorite', $message->id]]) !!}
            {!! Form::submit('お気に入りに追加', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif


