<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecomendedProducts extends Model
{
    protected $table = 'recomended_products';

    protected $fillable = [
      
        'product_id' , 'recommended_products' , 'created_at' , 'updated_at'
        
    ]; 
}
