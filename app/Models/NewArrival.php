<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewArrival extends Model
{
    protected $table = 'new_arrival';

    protected $fillable = [
      
        'title' , 'title_ar' , 'items' , 'created_at' , 'updated_at'
        
    ];

}
