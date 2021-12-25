<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class PromoCategories extends Model
{
    use Notifiable;

    protected $table = 'promo_categories';

    protected $fillable = [
        'title', 'title_ar' , 'photo' , 'bannerLink' ,'products' , 'created_at', 'updated_at'
    ];

    public function getPhotoAttribute($val) 
    {
        return ($val !== null) ? asset($val) : "";  
    }
}
