<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rate extends Model
{
    use Notifiable;

    protected $table = 'rates';

    protected $fillable = [
      
        'product_id' , 'email' , 'rate' , 'message' , 'created_at' , 'updated_at'
        
    ];
}
