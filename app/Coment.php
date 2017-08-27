<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
	protected $fillable = ['message_id', 'coment_user_id',	'coment'];
	
	
}
