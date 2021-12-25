<?php

namespace App;

use App\Http\Controllers\Front\Customer_LocationController;
use App\Models\Notification;
use App\Models\Wheel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Customer extends Model
{
    protected $table = 'customers';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone' , 'address' , 'latitude' , 'longitude' , 'password', 'fcm_token' , 'access_token' , 'ouath_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // Relation One Customer Has Many Locations
    public function customer_location() 
    {
        return $this->hasMany(Customer_Location::class, 'customer_id');
    }

    public function notifications()
    {
        return $this->hasMany('App/Models/Notification' , 'user_id' , 'id');
    }
}
