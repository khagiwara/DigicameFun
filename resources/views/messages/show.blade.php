<div>messages show.blade.php</div>
messagetile.blade.php


@extends('layouts.app')

@section('content')
    @if (Auth::check())

<div>
	{{ $message->imgpath }}<br>
	[message->id]={{ $message->id }}<br>
	[message->user_id]={{ $message->user_id }}<br>


</div>
<!-- 2.モーダルの配置 -->

		<div class="modal" id="modal-example" tabindex="-1">
    <div class="modal-dialog">

        <!-- 3.モーダルのコンテンツ -->
        <div class="modal-content">
            <!-- 4.モーダルのヘッダ -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-label">作品のタイトル</h4>
            </div>
            <!-- 5.モーダルのボディ -->
            <div class="modal-body">{{ $message->imgpath }}" alt="">
            </div>
            <!-- 6.モーダルのフッタ -->
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
	                <button class="btn btn-default" data-toggle="modal" data-target="#modal-example">
                    <img class="media-object img-rounded img-responsive" src="{{ $message->imgpath }}" alt="">
                    </button>
                </div>
 <!-- ------------------------------------------------ -->
               <input class="btn btn-primary btn-block" type="submit" value="お気に入り">
            </div>
        </aside>
        <div class="col-xs-7">
      	 	<div  style="border-bottom:  1px dotted #c0c0c0; padding-bottom: 10px">
        	<div class="media-left">
				<img class="media-object img-rounded" src="/image/<?php echo rand(1,17); ?>.png" alt="" width=50>
			</div>
			<div class="media-body">
				<div>
             　		<a href="#">投稿者の名前 </a><span class="text-muted">posted at 2017/08/23</span>
			 	</div>
			 	<div>
               <div class="comment mt5px"><b>作品穂のタイトル</b></div>
               <p>記事本文がここに入ります。記事本文がここに入ります。記事本文がここに入ります。</p>
            </div>
			 	<div style="width: 200px">
         		 <button type="button" class="btn btn-warning btn-xs pull-right">フォロー/アンフォロー</button> 
         		 <button type="button" class="btn btn-success btn-xs">削除</button> 
            </div>
			 </div>
        </div>
	  	 	<div class="panel panel-default">			 
					<div>
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