<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{
    use Notifiable;

    protected $table = 'categories';

    protected $fillable = [
        'category_name', 'category_name_ar' , 'photo' , 'main_category_id' , 'created_at', 'updated_at'
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function subCategories() 
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    
    // Relation One Category To Many Deals
    public function deal()
    {
        return $this->hasMany(Deals::class, 'category_id' , 'id');
    }
    
     // Relation One Category To Many Images
     public function categoryImage()
     {
         return $this->hasMany(CategoryImages::class, 'category_id' , 'id');
     }
}
