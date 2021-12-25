<?php

namespace App\Models;

use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Wheel extends Model
{
    use Notifiable;

    protected $table = 'wheel';

    protected $fillable = [
        'value' , 'active' , 'created_at', 'updated_at'
    ];
    
     public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'active' : 'unactive';
    }
}
