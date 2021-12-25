<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsProducts extends Model
{
    protected $table = "tags_products";

    protected $fillable = [
        'product_id' , 'tagsProducts' , 'created_at' , 'updated_at'
    ];

      // Relation one Product To Many Products 
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id' , 'id');
    }
}
