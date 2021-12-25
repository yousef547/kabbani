<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants';

    protected $fillable = [
      
        'product_id' , 'variant_type' , 'variant_id' , 'variant' , 'newPrice' , 'comparePrice' ,'sku' , 'Photo' , 'created_at' , 'updated_at'
        
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    // Relation One Product To Many Variants
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id' , 'id');
    }
}
