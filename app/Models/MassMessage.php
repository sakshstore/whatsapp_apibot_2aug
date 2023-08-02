<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 


class MassMessage extends Model
{
    
    static $rules = [
		'customer_tags' => 'required',
		'message_v1' => 'required',
	 
		'title' => 'required',
		'scheduled_at' => 'required',
	 
    ];

    protected $perPage = 20;

  
  
    protected $fillable = [	'title','customer_tags','message_v1','message_v2','message_v3','message_v4','message_v5' ,'status','scheduled_at','user_id','images'];



}
