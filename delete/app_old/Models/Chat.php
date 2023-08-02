<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Chat extends Model
{
    use HasFactory;
    
    
     
      protected $fillable = ['message','attachement','user_id','chat_requests_id','scheduled_at','type',
       'from_number','status' ,'category','from','url','referral'
    ];




    public function scopeUnsent(Builder $query): void
    {
        $query->where('status','New')->where('type','Scheduled');
    }
 
    public function scopeReadyToSend(Builder $query): void
    {
      $query->where('scheduled_at', '>=', Carbon::now()->subMinutes(2)->toDateTimeString());
}

    public function chatrequest(): BelongsTo
    {
        return $this->belongsTo(ChatRequest::class,'chat_requests_id');
    }

}
