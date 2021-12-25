<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product_Quantity extends Model
{
    use Notifiable;

    protected $table = 'products_quantities';

    protected $fillable = [
        'product_id', 'quantity' , 'seller_id' , 'created_at', 'updated_at'
    ];    
}
