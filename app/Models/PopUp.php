<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopUp extends Model
{
    protected $table = "popup";

    protected $fillable = [
        'product_id' , 'text' , 'text_ar' , 'photo' , 'created_at' , 'updated_at' 
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product' , 'product_id' , 'id');
    }

}
