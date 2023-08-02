<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
/**
 * Class MassMessage
 *
 * @property $id
 * @property $customer_tags
 * @property $message
 * @property $status
 * @property $scheduled_at
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MassMessage extends Model
{
    
    static $rules = [
		'customer_tags' => 'required',
		'message' => 'required',
	 
		'scheduled_at' => 'required',
	 
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_tags','message','status','scheduled_at','user_id'];



}
