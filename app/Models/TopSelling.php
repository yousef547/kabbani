<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopSelling extends Model
{
    protected $table = 'top_selling';

    protected $fillable = [
      
        'title' , 'title_ar' , 'items' , 'created_at' , 'updated_at'
        
    ];

}
