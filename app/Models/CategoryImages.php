<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImages extends Model
{
    protected $table = 'categoryimages';

    protected $fillable = [ 
        'id' , 'category_id' , 'image_name' , 'photo' , 'product_id' , 'created_at' , 'updated_at'
    ];

    public function getPhotoAttribute($val) 
    {
        return ($val !== null) ? asset($val) : "";  
    }

    // Relation Many Images To One Product
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id' , 'id');
    }
    
    // Relation Many Images To One Product
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id' , 'id');
    }
}
