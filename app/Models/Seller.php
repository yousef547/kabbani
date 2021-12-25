<?php

namespace App\Models;

use App\Observers\SellerObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Seller extends Model
{
    use Notifiable;

    protected $table = 'sellers';

    protected $fillable = [
        'photo' , 'seller_name' , 'seller_ar' , 'store_name' , 'store_ar' , 'main_category_id' , 'email' , 'active' , 'password' , 'phone' , 'address'
    ];

    protected $hidden = ['password'];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }
    
    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'active' : 'unactive';
    }

    // Relation one Seller To Many Products 
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'seller_id' , 'id');
    }

    public function mainCategory() 
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    public function slider() 
    {
        return $this->hasMany(Slider::class, 'seller_id');
    }

    protected static function boot()
    {
        parent::boot();
        Seller::observe(SellerObserver::class);
    }
}
