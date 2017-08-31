


    <ul class="nav nav-tabs">
        <li class="active">{!! link_to_route('users.index', '全て') !!}</li> 
        <li><a href="/followlist/{{ Auth::user()->id }}">フォロー</a></li>
        <li><a href="/followerlist/{{ Auth::user()->id }}">フォロワー</a></li>
    </ul>

@if (count($users) > 0)

<ul class="media-list userlistwrapper">
@foreach ($users as $user)
    <li class="media profile">
        <div class="media-left">
     	@if( $user->path )
     	    <img src="{{ $user->path  }}" alt="" height=120  width=120>
        @else
           <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 120) }}" alt="">
                    
        @endif  
            <div class="">
                {!! link_to_route('users.show', '作品', ['id' => $user->id],['class' => 'btn btn-default btn-sm']) !!}
                <div class="userfavarite"> @include('user_follow.follow_button', ['user' => $user]) </div>
            </div>
        </div>
        <div class="media-body" style="padding: 10px">
            <div class="favalitboard">
                <p>{{ $user->name }}</p>
                <p></p>{{ $user->aboutme }}</p>
            </div>


        </div>

    </li>
@endforeach
</ul>

{!! $users->render() !!}
@endif

