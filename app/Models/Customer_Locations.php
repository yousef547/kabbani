<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

class Customer_Locations extends Model
{
    use Notifiable;

    protected $table = 'customers_locations';

    protected $fillable = [
        'customer_id', 'email' , 'address' , 'latitude' , 'longitude' , 'created_at', 'updated_at'
    ];

    // Relation Many Locations Blongs TO One Customer
    public function customer() 
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
