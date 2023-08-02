<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRequest extends Model
{
    use HasFactory;
    
   
                    
    
    
      protected $fillable = [
       'from_number','status' ,'category','from','url','referral' ,'name' ,'display_phone_number','phone_number_id','app_id' ,'customer_tags','customer_note'
    ];



} 