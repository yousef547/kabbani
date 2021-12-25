<?php

namespace App\Models;

use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class GiftsUsers extends Model
{
    use Notifiable;

    protected $table = 'gifts_users';

    protected $fillable = [
        'user_id' , 'wheel_id' , 'created_at', 'updated_at'
    ];

    public function customer()
    {
        return $this->belongsToMany(Customer::class , 'gifts_users' , 'user_id' , 'wheel_id');
    }

    public function wheel()
    {
        return $this->belongsToMany(Wheel::class , 'gifts_users' , 'user_id' , 'wheel_id');
    }
}
