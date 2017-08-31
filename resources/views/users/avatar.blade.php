@extends('layouts.app')

@section('content')
<?php $i=0; ?>
     @include('users.left_menu')


{{-- <pre>{{ print_r( $user->toArray() ) }}</pre> --}}
 	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper">   
    	    <div id="right_header">
        	<h2>　アバター変更 </h2>
            </div>
 
            {!! Form::model($user, ['route' => ['avatar.store', $user->id], 'method' => 'put', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
            <div class="form-group">
                {!! Form::label('file', '画像アップロード:',['class'	=> 'col-sm-3 control-label', 'for' => 'file1']) !!}
 				<div class="col-sm-9">
                    {!! Form::file('file', ['class' => 'btn btn-success']) !!}              
			    </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9 text-right">
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>             
            {!! Form::close() !!}            
            </div>
        </div>   
	</div>
	<!-- #right ここまで -->    

    
@endsection