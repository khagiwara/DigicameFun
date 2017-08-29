@if (count($users) > 0)
<ul class="media-list">
@foreach ($users as $user)
    <li class="media profile">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 150) }}" alt="">
        </div>
        <div class="media-body" style="padding: 10px">
            <div>
                {{ $user->name }}<br>
                {{ $user->aboutme }}
            </div>
            <div>
                <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
            </div>
        </div>
        <div class="userlist">
                			@include('user_follow.follow_button', ['user' => $user])
        </div>
    </li>
@endforeach
</ul>
{!! $users->render() !!}
@endif

