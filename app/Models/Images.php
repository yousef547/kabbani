<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = [ 
        'id' , 'product_id' , 'image_name' , 'image_path' 
    ];

    public function getImagePathAttribute($val) 
    {
        return ($val !== null) ? asset($val) : "";  
    }

    // Relation Many Images To One Product
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'product_id' , 'id');
    }
}
