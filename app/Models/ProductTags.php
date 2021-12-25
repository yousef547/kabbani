<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductTags extends Model
{
    use Notifiable;

    protected $table = 'product_tags';

    protected $fillable = [
      
        'tag' , 'tag_ar' , 'color' , 'active' , 'created_at' , 'updated_at'
        
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
