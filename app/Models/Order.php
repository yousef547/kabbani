<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','order_id','order_number','created_on','closed_at','currency','order_status_url',
        'token','total_discounts','total_price','contact_email','vendor','created_at','updated_at'
    ];
}
