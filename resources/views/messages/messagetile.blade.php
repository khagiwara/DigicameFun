messagetile.blade.php


@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div>messagetile.blade.php</div>
        
      @if (count($messages) > 0)
 			<div class="container">
 			{!! $messages->render() !!}
			<div class="row">
			@foreach ($messages as $message)
			<?php $user = $message->user ?>
	            
	            
	            
                
                
                
	    	<div class="item">
	                <div class="col-md-3 col-sm-4 col-xs-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading text-center favalitboard">
		                        <a href="/messages/{{ $message->id }}"><img src="{{ $message->imgpath }}" alt="" class="itemfit"></a>
								@include('message_favarite.favarite_button', ['user' => $user])
	                        </div>
	                        <div class="panel-body">
	                            <p class="item-date">{{ $message->create_at }}</p>
	                            <p class="item-title">{{ $message->title }}</p>
	                            <p class="item-title">{{ $user->name }}</p>
	                        </div>
	                    </div>
	                </div>
	        </div>

                

                
            @endforeach
			</div></div>
    @endif      

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection