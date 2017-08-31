@extends('layouts.app')

@section('content')
@if (Auth::check())
{{--
	<div>
		{{ $message->imgpath }}<br>
		[message->id]={{ $message->id }}<br>
		[message->user_id]={{ $message->user_id }}<br>
		<pre>
		{{ print_r( $message )}}
		</pre>
	
	</div>
--}}
	<!-- 2.モーダルの配置 -->
	<div class="modal" id="modal-photo" tabindex="-1">
	    <div class="modal-dialog">
	
	        <!-- 3.モーダルのコンテンツ  -->
	        <div class="modal-content">
	            <!-- 4.モーダルのヘッダ  -->
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <h4 class="modal-title" id="modal-label">作品のタイトル</h4>
	            </div>
	            <!-- 5.モーダルのボディ -->
	            <div class="modal-body"><center><img src="{{ $message->imgpath }}" alt=""></center>
	            </div>
	            <!-- 6.モーダルのフッタ  -->
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
	<!--                 <button type="button" class="btn btn-primary">保存</button> -->
	            </div>
	        </div>
	    </div>
	</div>	
	
	<div class="container">
		<div class="row">
	        <aside class="col-xs-5">
	            <div class="panel panel-default">
					<!-- ------------------------------------------------ -->
	                <div class="panel-body">
		                <button class="btn btn-default" data-toggle="modal" data-target="#modal-photo">
	                    <img class="media-object img-rounded img-responsive" src="{{ $message->imgpath }}" alt="">
	                    </button>
	                </div>
					<!-- ------------------------------------------------ -->
					@include('message_favarite.favarite_button', ['user' => $user])
	            </div>
	        </aside>
	        <div class="col-xs-7">
	      	 	<div style="margin-bottom: 10px">
		  	 		<!-- --------------------------------------------------
					// オリジナルメッセージ
					//--------------------------------------------------- -->
		        	<div class="media-left" style="padding: 30px;">
				    	@if( $user->path )
							<img class="media-object img-rounded" src="{{ $user->path }}" alt="" width=50>
				        @else
							<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 250) }}" alt="" width=50>
						@endif		        		
						<!--<img class="media-object img-rounded" src="/image/<?php echo rand(1,17); ?>.png" alt="" width=50>-->
					</div>
					<div class="media-body">
						<div>
							<a href="#">{{ $message->name }}</a><span class="text-muted">{{ $message->updated_at }}</span>
						</div>
						<div>
							<div class="comment mt5px"><b>{{ $message->title }}</b></div>
							<p>{{ $message->message }}</p>
						</div>
						<div>							
							<!--@include('user_follow.follow_button', ['user' => $user])-->
			                @if (Auth::user()->id == $message->user_id)
			                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
			                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
			                    {!! Form::close() !!}
			                @endif							
<!-- 							<button type="button" class="btn btn-success btn-xs">削除</button>  -->
						</div>						
					</div>
				</div>
		  	 	<div class="panel panel-default">			 
					<!-- --------------------------------------------------
					// コメント
					//--------------------------------------------------- -->
					@if (count($coments) > 0 )
					     <div class="modal-header">
						     <h4 class="ml10px" id="coment_count">コメント{{ count($coments) }}件</h4>
					      </div>
						  @foreach ($coments as $coment )
					      <div class="modal-body" id="comentlist">
					        <div class="row">
					          <div class="col-md-12">
					            <div>
					              <div><a  href="#" class="username">{{ $coment->name }}</a> <span class="commentdate">{{ $coment->updated_at }}</span></div>
					              <div class="comment mt5px">{{ $coment->coment }}</div>
					
					            </div>
					          </div>
					        </div>
					 
					       </div>
					      @endforeach
					      
					@endif  
			      
					<!-- --------------------------------------------------
					// コメント 追加用テキストエリア
					//--------------------------------------------------- -->
					<div class="modal-footer">
				      
		                {!! Form::open(['route' => 'coment.store']) !!}
		                    <div class="form-group">
		                        {!! Form::textarea('coment', old('coment'), ['class' => 'form-control', 'rows' => '2','cols' => '60']) !!}
		                     {!! Form::hidden('message_id',  $message->id) !!}
		                     {!! Form::hidden('user_id', $message->user_id) !!}
		                   </div>
		                      <div class="pull-left mt10px">
		                    {!! Form::submit('コメント', ['class' => 'btn btn-info btn-block']) !!}
		                      </div>
		                {!! Form::close() !!}
			 
					</div>	 
				</div>			 
	        </div>
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