<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    protected $table = "installments";

    protected $fillable = [
        'installment_name' , 'installment_name_ar' , 'installment_type' , 'installment_type_ar' , 'photo' , 'description' , 'description_ar' , 'created_at' , 'updated_at'
    ]; 

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }
}
