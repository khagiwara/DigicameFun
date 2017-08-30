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

				            <span><b>タイトル：</b>{{ $message->title }}</span>
							<span class="lm10">posted at 2017/08/23</span>
							<p>{{ $message->message }}</p>
							<div>
				         		 <button type="button" class="btn btn-success btn-xs">削除</button> 
				            </div>
				   	</div>
    		</div>
		@endforeach
{!! $messages->render() !!}

    	</div>   
	</div>
	<!-- #right ここまで -->













@endsection