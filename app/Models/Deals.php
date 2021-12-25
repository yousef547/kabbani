<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    protected $table = "deals";

    protected $fillable = [
        'dealName' , 'dealName_ar' , 'dealType' , 'category_id' , 'product_id' , 'photo1' , 'photo2' , 'created_at' , 'updated_at'
    ]; 

    public function getPhoto1Attribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function getPhoto2Attribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    // Relation One Category To Many Deals
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id' , 'id');
    }

    // Relation One Category To Many Deals
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }
}
