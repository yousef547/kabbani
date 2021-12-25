<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
      
         'product_id' , 'title' , 'body' , 'image' , 'notification_date' , 'created_at' , 'updated_at'
    ];

    public function getImageAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer' , 'user_id' , 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product' , 'product_id' , 'id');
    }
}
