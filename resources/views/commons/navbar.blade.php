<header>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-brand" href="/messages">デジカメファン</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
                        <li>{!! link_to_route('favorite.list', 'お気に入り一覧') !!}</li>
                        <!--<li>{!! link_to_route('message.list', 'メッセージ一覧') !!}</li>-->
                        <li>{!! link_to_route('users.index', 'ユーザー') !!}</li>
						<li>{!! link_to_route('messages.create', '新規メッセージの投稿') !!}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.show', Auth::user()->id) }}">マイページ</a></li>      
                                <li><a href="{{ route('messagelist.edit', Auth::user()->id) }}">作品の管理</li></a>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('signup.get', 'Signup') !!}</li>
                        <li>{!! link_to_route('login.get', 'Login') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
