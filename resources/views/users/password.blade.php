@extends('layouts.app')

@section('content')

     @include('users.left_menu')
<!--<div>password</div>-->
<!--<pre>{{ print_r( $user->toArray() ) }}</pre>-->




	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper">   
        {!! Form::model($user, ['route' => ['update.passwod', $user->id], 'method' => 'put']) !!}
            @if ( Session::has('flash_message'))
                <div class="alert alert-warning">{{ Session::get('flash_message') }}</div>            
            @endif
  
    	    <div id="right_header">
        	<h2>　パスワードの変更 </h2>
            </div>
             <div class="row uline">
               <div class="form-group">
                    {!! Form::label('password', '現在のパスワード:',['class'	=> 'col-xs-4 col-sm-4 usr_title', 'for' => 'password']) !!}
                     <div class="col-xs-8 col-sm-8" style="padding-top: 10px">
                    {!! Form::password('password', null, ['class' => 'form-control','id' => 'password']) !!}
                    </div>
                </div>
            </div>
            
            
            <div class="row uline">
                <div class="form-group">
                    {!! Form::label('newpassword', '新しいパスワード:',['class'	=> 'col-xs-4 col-sm-4 usr_title', 'for' => 'newpassword']) !!}
                     <div class="col-xs-8 col-sm-8" style="padding-top: 10px">
                    {!! Form::password('newpassword', null, ['class' => 'form-control','id' => 'newpassword']) !!}
                    </div>
                </div>
            </div>            
            
            <div class="row uline">
               <div class="form-group">
                    {!! Form::label('newpassword_confirmation', '新しいパスワードの確認:',['class'	=> 'col-xs-4 col-sm-4 usr_title', 'for' => 'newpassword_confirmation']) !!}
                     <div class="col-xs-8 col-sm-8" style="padding-top: 10px">
                    {!! Form::password('newpassword_confirmation', null, ['class' => 'form-control','id' => 'newpassword_confirmation']) !!}
                    </div>
                </div>
            </div> 

            
             <div class="row uline">
               <div class="form-group">
                    {!! Form::submit('更新',['class'	=> 'col-xs-3 col-sm-3 btn btn-primary' ]) !!}
                </div>
            </div>  
	</div>
	<!-- #right ここまで -->    
@endsection