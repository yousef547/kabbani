<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstallmentsForm extends Model
{
    protected $table = "installmentsform";

    protected $fillable = [
        'name' , 'phone' , 'email' , 'address' , 'installment_type' , 'created_at' , 'updated_at'
    ]; 
}
