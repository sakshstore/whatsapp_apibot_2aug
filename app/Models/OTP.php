<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;
    
       protected $table = 'otps';
    
     protected $fillable = ['code','purpose',  'user_id'];

    public function user()
    {
        return $this->belongsTo( User::class);
    }
    
}
