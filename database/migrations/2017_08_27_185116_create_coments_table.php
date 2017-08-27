<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coments', function (Blueprint $table) {
            $table->increments('id');
 			$table->integer('message_id')->unsigned()->index();			//	メッセージID
			$table->integer('coment_user_id')->unsigned()->index();		// 	コメントユーザーID
			$table->string('coment',255);								//  コメント    
			
            // 外部キー制約
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('coment_user_id')->references('id')->on('users');
            			        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coments');
    }
}
