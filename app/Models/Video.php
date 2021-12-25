<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Video extends Model
{
    use Notifiable;

    protected $table = 'videos_learning';

    protected $fillable = [
        'name', 'url' , 'created_at', 'updated_at'
    ];    
}
