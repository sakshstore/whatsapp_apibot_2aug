<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
          return [
        'id' => $this->id,
        'firstname' => $this->name, 
        'lastname' => $this->name,
        'email' => $this->email,
         
        'reg_date' => $this->updated_at,
    ];
    }
    
        public static $wrap = 'user';
}
