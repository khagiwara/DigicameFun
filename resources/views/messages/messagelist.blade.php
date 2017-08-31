messagelist.blade.php

@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div>messagelis.blade.php</div>
    
        <?php $user = Auth::user(); ?>
        {{ $user->name }}
        
        
	<div class="container">
	    <?php for($i=0; $i<10; $i++ ){ ?>
	    <div class="panel panel-default" style="padding:5px 5px 10px 30px">
    		<div class="row mt10px">
				    <div class="col-sm-5">
				        	<div class="listimg">
								<img class="media-object img-rounded　itemfit" src="/image/<?php echo rand(1,30); ?>.jpg" alt="" height=150>
							</div>
				    </div>
				    <div class="col-sm-7">
							<div class="media-body">
								<div>
				             　		<a href="#">投稿者の名前 </a><span class="text-muted">posted at 2017/08/23</span>
							 	</div>
							 	<div>
				               <div class="comment mt5px"><b>コメントタイトル</b></div>
				               <p>記事本文がここに入ります。記事本文がここに入ります。記事本文がここに入ります。</p>
				            </div>
							 	<div style="width: 200px">
				         		 <button type="button" class="btn btn-warning btn-xs pull-right">お気に入り</button> 
				         		 <button type="button" class="btn btn-success btn-xs">削除</button> 
				            </div>
						</div>
				   	</div>
    		</div>
    	</div>
		<?php } ?>
    	</div>
	</div>
	
	
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection