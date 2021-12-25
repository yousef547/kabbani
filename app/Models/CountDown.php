<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountDown extends Model
{
    protected $table = "count_down";

    protected $fillable = [
        'title' , 'title_ar' , 'tdate' , 'days' , 'hours' , 'minutes' , 'seconds' , 'active' , 'created_at' , 'updated_at'
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
