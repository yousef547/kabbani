<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Tag extends Model
{
    use Notifiable;

    protected $table = 'tags';

    protected $fillable = [
        'tag_name', 'sub_category_id' , 'created_at', 'updated_at'
    ];    
}
