<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewProducts extends Model
{
    protected $table = 'review_products';

    protected $fillable = [
      
        'user_id' , 'product_id' , 'review_num' , 'review_comment' , 'created_at' , 'updated_at'
        
    ];
}
