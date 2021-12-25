<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use Notifiable;

    protected $table = 'main_categories';

    protected $fillable = [
        'name', 'name_ar' , 'photo' , 'created_at', 'updated_at'
    ];

    public function getPhotoAttribute($val) 
    {
        return ($val !== null) ? asset($val) : "";  
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class, 'main_category_id');
    }

    public function sub_categories() 
    {
        return $this->hasMany(SubCategory::class , 'main_category_id');
    }
}
