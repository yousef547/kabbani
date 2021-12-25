<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{
    use Notifiable;

    protected $table = 'slider';

    protected $fillable = [
      
        'seller_id' , 'product_id' , 'photo' , 'created_at' , 'updated_at'
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    // Relation one Product To Many Sliders 
    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id' , 'id');
    }

    public function sellers()
    {
        return $this->belongsTo(Seller::class, 'seller_id' , 'id');
    }
}
