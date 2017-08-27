messagetile.blade.php


@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div>welcom.blade.php</div>
    
        <?php $user = Auth::user(); 
	        $i=0;
        ?>
        
      @if (count($messages) > 0)
 			<div class="container">
			<div class="row">
			@foreach ($messages as $message)
            <?php $i++; ?>    
                
	    	<div class="item">
	                <div class="col-md-3 col-sm-4 col-xs-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading text-center">
		                        <a href="messages/{{ $message->id }}"><img src="{{ $message->imgpath }}" alt="" class="itemfit"></a>
	                        </div>
	                        <div class="panel-body">
	                            <p class="item-date">2017/08/23</p>
	                            <p class="item-title"><a href="messages/{{ $message->id }}">{{ $message->title }}</a></p>
	                            <p class="item-title">{{ $message->name }}</p>
	                        </div>
	                    </div>
	                </div>
	        </div>

                

                
            @endforeach
			</div></div>
    @endif      
        
        
        
        

        
        
        
        
        ?>
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection