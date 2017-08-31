	<!-- #left ここから -->
	<div id="left">
        <div id="avatarimage">

    	@if ( $user->path )
 		<!--<img class="media-object img-rounded img-responsive" src="{{ $user->path }}" style="width: 250px height: 250; margin: 20px auto;" alt="">   -->
		<img class="listimg" src="{{ $user->path  }}" alt="" height=250  width=250>
        @else
		<img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 250) }}" alt="">
        @endif
        </div>
		<ul>
                <li><a href="/users/{{ $user->id }}"><i class="fa fa-address-card-o" aria-hidden="true"></i>　プロファイル</li></a>		    
                <li><a href="/avatar/{{ $user->id }}"><i class="fa fa-address-book-o" aria-hidden="true"></i>　アバター画像</li></a>
                <li><a href="/password/{{ $user->id }}"><i class="fa fa-lock" aria-hidden="true"></i>　パスワードの変更</li></a>
				<li><a href="/messagelist/{{ $user->id }}"><i class="fa fa-file-image-o" aria-hidden="true"></i>　作品の管理</li></a>
				<li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>　ログアウト</li></a>	



		</ul>
	</div>
	<!-- #left ここまで -->