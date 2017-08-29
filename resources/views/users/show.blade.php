@extends('layouts.app')

@section('content')
<?php $i=0; ?>
     @include('users.left_menu')


	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper">   
    	    <div id="right_header">
        	<h2>　プロファイル </h2>
        	</div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">名前</div>
                <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">ユーザーネーム</div>
                <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">ウエブサイト</div>
                <div class="col-xs-9col-sm-9 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">自己紹介</div>
                <div class="col-xs-9 col-sm-9 usr_val">col-sm-5<br>ccccccccc<br>ddddfdfffffff</div>
            </div>
    
             <div class="row uline">
                <div class="col-xs-3 col-sm-offset-3 col-sm-9 usr_hidden">非公開情報</div>
             </div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">メールアドレス</div>
                <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-3 col-sm-3 usr_title">性別</div>
                <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">col-sm-5</div>
            </div>
    	</div>   
	</div>
	<!-- #right ここまで -->





{{--
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
				@include('user_follow.follow_button', ['user' => $user])
				
				

            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#">Messages</a></li>
                <li><a href="#">Followings</a></li>
                <li><a href="#">Followers</a></li>
                <li><a href="{{ route('users.profile', ['id' => $user->id]) }}">Profile</a></li>
            </ul>
        </div>
    </div>
 --}}   


 
    
@endsection