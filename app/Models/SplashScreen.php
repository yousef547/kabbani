<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SplashScreen extends Model
{
    use Notifiable;

    protected $table = 'splashscreen';

    protected $fillable = [
      
        'photo' , 'created_at' , 'updated_at'
    ];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }
}
