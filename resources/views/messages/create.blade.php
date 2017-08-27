@extends('layouts.app')

@section('content')
            {!! Form::model($message, ['route' => 'messages.store','class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ]) !!}
            
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:',['class'	=> 'col-sm-3 control-label', 'for' => 'ask1']) !!}
                     <div class="col-sm-9">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                     </div>
                </div>
                    
                <div class="form-group">
					{!! Form::label('message', 'メッセージ:',['class'	=> 'col-sm-3 control-label', 'for' => 'ask1']) !!}
					<div class="col-sm-9">
					{!! Form::textarea('message', null, ['class' => 'form-control','rows' => "5" ]) !!}
					</div>
                </div>
                
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
   <script>
$(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.parent().parent().next(':text').val(label);
});
</script>
@endsection