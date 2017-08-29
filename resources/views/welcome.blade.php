@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div>welcom.blade.php</div>
    
        <?php $user = Auth::user(); ?>
        {{ $user->name }}
        
        
        <?php
        
		echo "<div class=\"container\">\n",
			"<div class=\"row\">\n";
		for( $i=1; $i<30; $i++ ){
			?>		
	    	<div class="item">
	                <div class="col-md-3 col-sm-4 col-xs-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading text-center">
		                        <a href="/index.php/items/<?php echo $i; ?>"><img src="/image/<?php echo $i; ?>.jpg" alt="" class="itemfit"></a>
	                        </div>
	                        <div class="panel-body">
	                            <p class="item-date">2017/08/23</p>
	                            <p class="item-title"><a href="/index.php/items/<?php echo $i; ?>">画像のタイトル<?php printf( "%03d", $i ); ?></a></p>
	                            <p class="item-title">ユーザー<?php printf( "%03d",rand(1,100) % 5 +1 ); ?>の名前</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
			<?php		
		}	
		echo "</div>\n",
			"</div>\n";	
        
        
        
        
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