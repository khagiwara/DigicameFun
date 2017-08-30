@extends('layouts.app')

@section('content')
<?php $i=0; ?>
     @include('users.left_menu')


	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper"> 

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

    	    <div id="right_header">
        	<h2>　プロファイル </h2>
        	</div>
            <div class="row uline">
                <!--<div class="col-xs-3 col-sm-3 usr_title">名前</div>-->
                <!--<div class="col-xs-9 col-sm-9 usr_val usr_lineheight">col-sm-5</div>-->
                
                <div class="form-group">
                    {!! Form::label('name', '名前:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'name']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                    </div>
                </div>
            </div>
                
            <div class="row uline">
               <div class="form-group">
                    {!! Form::label('nickname', 'ニックネーム:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'nickname']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::text('nickname', null, ['class' => 'form-control','id' => 'nickname']) !!}
                    </div>
                </div>
            </div>
                
            <div class="row uline">
               <div class="form-group">
                    {!! Form::label('website', 'ウエブサイト:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'website']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::text('website', null, ['class' => 'form-control','id' => 'website']) !!}
                    </div>
                </div>
            </div>

            <div class="row uline2">
               <div class="form-group">
                    {!! Form::label('aboutme', '自己紹介:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'aboutme']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::textarea('aboutme', null, ['size' => '30x5','class' => 'form-control','id' => 'aboutme']) !!}
                    </div>
                </div>
            </div>

             <div class="row uline">
                <div class="col-xs-3 col-sm-offset-3 col-sm-9 usr_hidden">非公開情報</div>
             </div>
             
             <div class="row uline">
               <div class="form-group">
                    {!! Form::label('email', 'メールアドレス:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'email']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::text('email', null, ['class' => 'form-control','id' => 'email']) !!}
                    </div>
                </div>
            </div>
            
             <div class="row uline">
               <div class="form-group">
                    {!! Form::label('sex', '性別:',['class'	=> 'col-xs-3 col-sm-3 usr_title', 'for' => 'email']) !!}
                     <div class="col-xs-9 col-sm-9 usr_val usr_lineheight">
                    {!! Form::select('sex',config('sex'), null, ['class' => 'form-control','id' => 'email']) !!}
                    </div>
                </div>
            </div>             
            <div class="row uline">
               <div class="form-group">
                    {!! Form::submit('更新',['class'	=> 'col-xs-3 col-sm-3 btn btn-primary' ]) !!}
                </div>
            </div>               
    	</div>
    	
    {!! Form::close() !!}    
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