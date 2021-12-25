<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Page extends Model
{
    use Notifiable;

    protected $table = 'products';

    protected $fillable = [
        'id' , 'product_name', 'name_ar' , 'main_category_id' , 'seller_id' , 'category_id' , 'sub_category_id' , 
        'quant' , 'min_quant' , 'price' , 'compare_price' , 'warranty' , 'warranty_ar' , 'description' , 'description_ar' , 'specification' , 
        'specification_ar' , 'deliv_time' , 'deliv_free' , 'photo' , 'active' , 'allTags' , 'allImages' ,
        'deals' , 'deals_price' , 'varient_title' , 'varient_list' , 'related_products' , 'recommended_products' ,
         'shopify_id' , 'variant_id' , 'sku' ,'created_at', 'updated_at'
    ];

}
