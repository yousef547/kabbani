<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Sub_Sub_Category extends Model
{
    use Notifiable;

    protected $table = 'sub_sub_category'; 

    protected $fillable = [
        'sub_sub_category_name','sub_sub_category_name_ar' , 'photo' , 'sub_category_id' , 'category_id' , 'main_category_id' , 'created_at', 'updated_at'
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function subCategory() 
    {
        return $this->belongsTo(SubCategory::class , 'sub_category_id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function mainCategory() 
    {
        return $this->belongsTo(MainCategory::class , 'main_category_id');
    }
}
