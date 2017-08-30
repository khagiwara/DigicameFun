@extends('layouts.app')

@section('content')

     @include('users.left_menu')
<div>password</div>
<pre>{{ print_r( $user->toArray() ) }}</pre>



	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper">   
    	    <div id="right_header">
        	<h2>　パスワードの変更 </h2>
            </div>
            <div class="row uline">
                <div class="col-xs-4 col-sm-4 usr_title">現在のパスワード</div>
                <div class="col-xs-8 col-sm-8 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-4 col-sm-4 usr_title">新しいパスワード</div>
                <div class="col-xs-9 col-sm-8 usr_val usr_lineheight">col-sm-5</div>
            </div>
            <div class="row uline">
                <div class="col-xs-4 col-sm-4 usr_title">新しいパスワードの確認</div>
                <div class="col-xs-8 col-sm-8 usr_val usr_lineheight">col-sm-5</div>
            </div>
            
    	</div>   
	</div>
	<!-- #right ここまで -->    
@endsection