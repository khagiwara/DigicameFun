@extends('layouts.app')

@section('content')
            {!! Form::model($message, ['route' => ['messages.update', $message->id]  ,'method' => 'put', 'enctype' => 'multipart/form-data' ]) !!}
 <div style="width: 800px">     
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:',['class'	=> 'col-sm-3 control-label', 'for' => 'ask1']) !!}
                     <div class="col-sm-9">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     </div>
                </div>

 <p>&nbsp;</p>
                <div class="form-group">
					{!! Form::label('message', 'メッセージ:',['class'	=> 'col-sm-3 control-label', 'for' => 'ask1']) !!}
					<div class="col-sm-9 control-lavel">
					{!! Form::textarea('message', null, ['class' => 'form-control','rows' => "5" ]) !!}
					</div>
                </div>
<p>&nbsp;</p>              
      {!! Form::label('file', '画像アップロード:',['class'	=> 'col-sm-3 control-label', 'for' => 'file1']) !!}
 					<div class="col-sm-9">
   {!! Form::file('file', ['class' => 'btn btn-success']) !!}              
					</div>

     <div id="row">
        <div class="form-group">

        {!! Form::label('file', '画像交換する場合は交換するファイル選択します。',['class'	=> 'col-sm-3 control-label', 'for' => 'file1']) !!}
            <div class="col-sm-9">

                    <div class="form-group">
                        <div class=" msg_toukou">
                            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>                 
                <div style="width:435;height: 430px; background-color: #f0f0f0">
                <!-- ------------------------------------------------ -->
	                <div class="panel-body">

	                    <img  style="width: 400px; height: 400px; object-fit: cover;" src="{{ $message->imgpath }}" alt="">

	                </div>
                <!-- ------------------------------------------------ -->
	            </div>
            </div>
        </div>
    </div>     
                
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9 text-right">
     {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>   
</div>
            {!! Form::close() !!}
   <script>
$(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().parent().next(':text').val(label);
});
</script>
@endsection