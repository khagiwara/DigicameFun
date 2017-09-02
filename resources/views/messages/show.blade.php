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
	            <div>
					<!-- ------------------------------------------------ -->
	                <div class="panel-body">
		                <button class="btn btn-default" data-toggle="modal" data-target="#modal-photo">
	                    <img class="media-object img-rounded img-responsive" src="{{ $message->imgpath }}" alt="">
	                    </button>
	                </div>
					<!-- ------------------------------------------------ -->
					@include('message_favarite.favarite_button2', ['user' => $user])
	            </div>
	        </aside>
	        <div class="col-xs-7" id="message-left">
	        	<div class="org-message">
		    			<div class="row">
							    <div class="col-sm-3" class="avt-aria">
							    	@if( $user->path )
										<img class="media-object img-rounded" src="{{ $user->path }}" alt="" width=150>
							        @else
										<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 200) }}" alt="" width=150>
									@endif		        		
			
							    </div>
							    <div class="col-sm-7">
									<div>
							            <span class="titlemessage">タイトル：{{ $message->title }}</span>
										<p><b></b>posted at</b> {{ $message->updated_at }}
											@if ( $favaritcount > 0 )	
												Favarigings <span class="badge">{{ $favaritcount }}</span> 
											@endif										
										</p>
										<p  class="titlemessage">{{ $message->message }}</p>
									</div>
									@if( !$favaritcount )
									<div>
											{!! Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
			 							   		{!! link_to_route('messages.edit', 'このメッセージ編集', ['id' => $message->id],['class' => "btn btn-warning btn-xs messageEdit"]) !!}
			 							   		{!! Form::submit('削除', ['class' => 'btn btn-success btn-xs']) !!}
			    							{!! Form::close() !!}				   
									</div>
									@endif
							   	</div>
		    			</div>
	        	</div>
	        	<div class="msg-comment">


					<!-- --------------------------------------------------
					// コメント
					//--------------------------------------------------- -->
					@if (count($coments) > 0 )
						<div style="padding: 10px">
							  @foreach ($coments as $coment )
					              <div><a  href="#" class="username">{{ $coment->name }}</a> <span class="commentdate">{{ $coment->updated_at }}</span></div>
					              <div class="cmt_body">{{ $coment->coment }}</div>
					    	  @endforeach
					    <div>
					      
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