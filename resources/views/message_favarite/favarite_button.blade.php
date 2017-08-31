{{--
<div>$favarite_button.blade.php</div>
{{ $user }}
{{ Auth::User() }}
{{ $topright
--}}

    @if (Auth::user()->is_favariting($message->id))
        {!! Form::open(['route' => ['message.unfavarite', $message->id], 'method' => 'delete']) !!}
            <button onclick="submit()" class="favalittile"><i class="fa fa-heart"></i></button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['message.favorite', $message->id]]) !!}
            <button onclick="submit()" class="favalittile"><i class="fa fa-heart-o"></i></button>
        {!! Form::close() !!}
    @endif


{{-->


@if (Auth::user()->id != $user->id) 
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            <button onclick="submit()"><i class="fa fa-heart"></i></button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            <button onclick="submit()"><i class="fa fa-heart-o"></i></button>
        {!! Form::close() !!}
    @endif
@endif


--}}