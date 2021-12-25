<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';

    protected $fillable = [
      
        'user_id' , 'user_type' , 'message'  ,'photo' , 'chat_date' , 'created_at' , 'updated_at'
        
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }
}
