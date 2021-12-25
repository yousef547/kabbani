<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    protected $table = 'related_products';

    protected $fillable = [
      
        'product_id' , 'related_products' , 'created_at' , 'updated_at'
        
    ];

     // Relation Many Products To one Products
     public function product()
     {
         return $this->belongsTo('App\Models\Product', 'product_id' , 'id');
     }
}
