<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $table = 'products';

    protected $fillable = [ 
        'id' , 'product_name', 'name_ar' , 'main_category_id' , 'seller_id' , 'category_id' , 'sub_category_id' , 
        'quant' , 'min_quant' , 'price' , 'compare_price' , 'warranty' , 'warranty_ar' , 'description' , 'description_ar' , 'specification' , 
        'specification_ar' , 'deliv_time' , 'deliv_free' , 'photo' , 'active' , 'allTags' , "grouped" , "product_parts" , "productTag_id" ,
        'deals' , 'deals_price' , 'varient_title' , 'varient_list' , 'related_products' ,'recommended_products' , 'created_at', 'updated_at'
    ];
    
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset($val) : ""; 
    }

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'active' : 'unactive';
    }

    public function getDelivery()
    {
        return $this->active == 1 ? 'Yes' : 'No';
    }

    // Relation Many Products To One Seller
    public function seller()
    {
        return $this->belongsTo('App\Models\Seller', 'seller_id' , 'id');
    }

    // Relation One Product To Many Sliders
    public function slider()
    {
        return $this->belongsTo('App\Models\Slider', 'product_id' , 'id');
    }

    // Relation One Product To Many Images
    public function images()
    {
        return $this->belongsTo('App\Models\Image', 'product_id' , 'id');
    }

    // Relation One Product To Many Products
    public function related_products()
    {
        return $this->hasMany('App\Models\RelatedProducts', 'product_id' , 'id');
    }
    
     // Relation One Product To Many Deals
    public function deal()
    {
        return $this->hasMany('App\Models\Deals', 'product_id' , 'id');
    }
    
     // Relation One Product To Many Images
    public function categoryImage()
    {
        return $this->hasMany('App\Models\CategoryImages', 'product_id' , 'id');
    }
    
    // Relation One Product To Many Tags
    public function tagsProduct()
    {
        return $this->hasMany('App\Models\TagsProducts', 'product_id' , 'id');
    }
}
