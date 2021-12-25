<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use Notifiable;

    protected $table = 'locations';

    protected $fillable = [
        'seller_id' , 'location' , 'location_ar' , 'theAddress' , 'latitude' , 'longitude' , 'distance' 
    ];

}
