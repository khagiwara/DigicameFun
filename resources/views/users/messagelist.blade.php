@extends('layouts.app')

@section('content')
     @include('users.left_menu')
<!--<div>messagelist</div>-->
<!--<div>password</div>-->
<!--<pre>{{ print_r( $user->toArray() ) }}</pre>-->
<!--<pre>-->
<!--{!! print_r( $messages->toArray() ) !!}; -->
<!--</pre>-->

	<!-- #right ここから -->
	<div id="right">
        <div id="wrapper">   
    	    <div id="right_header">
        	<h2>　作品の管理 </h2>
        	</div>


{!! $messages->render() !!}
			@foreach ($messages as $message)
    			<div class="row listimgbody">
				    <div class="col-sm-5">
				        	<div>
								<img class="itemfit listimg" src="{{ $message->imgpath }}" alt="" height=150>
							</div>
				    </div>
				    <div class="col-sm-7">
				    	<?php $favarings = $message->favaritings()->count(); ?>

				            <span><b>タイトル：</b>{{ $message->title }}</span><br>
							<span>posted at {{ $message->updated_at }}</span>
							@if ( $favarings > 0 )	
								Favarigings <span class="badge">{{ $message->favaritings()->count() }}</span> 
							@endif
							<p>{{ $message->message }}</p>
							@if(  !$message->favaritings()->count()  )
							<div>
								{!! Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
 							   		{!! link_to_route('messages.edit', 'このメッセージ編集', ['id' => $message->id],['class' => "btn btn-warning btn-xs messageEdit"]) !!}

 							   			{!! Form::submit('削除', ['class' => 'btn btn-success btn-xs']) !!}

    							{!! Form::close() !!}				   
				            </div>
							@endif
				   	</div>
    			</div>
			@endforeach
{!! $messages->render() !!}

    	</div>   
	</div>
	<!-- #right ここまで -->













@endsection