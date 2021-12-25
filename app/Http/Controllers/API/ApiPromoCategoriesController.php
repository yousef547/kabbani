<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PromoCategories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class ApiPromoCategoriesController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $promoCategories = PromoCategories::get();
        $subCategories = SubCategory::get();
        $products= Product::get();
        
        foreach($promoCategories as $promoCategory)
        
        {
            $integerIDs = array_map('intval', json_decode($promoCategory->products));
            $promoCategory['products'] = $integerIDs;
            $products_arr["records"]=array();
            unset($resultss);    
            
            $data = $promoCategory['products'];
                for($i = 0 ; $i < count($data) ; $i++)
                {
                foreach($products as $product)
                    if($product->id == $data[$i])
                       {
                            $resultss[] = array (
                                        'id' => $product['id'],
                                        'product_name' => $product['product_name'],
                                        'name_ar' => $product['name_ar'],
                                        'photo' => $product['photo'],
                                        'main_category_id' => $product['main_category_id'],
                                        'seller_id' => $product['seller_id'],
                                        'category_id' => $product['category_id'],
                                        'sub_category_id' => $product['sub_category_id'],
                                        'sub_sub_category_id' => $product['sub_sub_category_id'],
                                        'quant' => $product['quant'],
                                        'min_quant' => $product['min_quant'],
                                        'price' => $product['price'],
                                        'compare_price' => $product['compare_price'],
                                        'warranty' => $product['warranty'],
                                        'warranty_ar' => $product['warranty_ar'],
                                        'description' => $product['description'],
                                        'description_ar' => $product['description_ar'],
                                        'specification' => $product['specification'],
                                        'specification_ar' => $product['specification_ar'],
                                        'deliv_time' => $product['deliv_time'],
                                        'deliv_free' => $product['deliv_free'],
                                        'active' => $product['active'],
                                        'deals' => $product['deals'],
                                        'deals_price' => $product['deals_price'],
                                        'allTags' => $product['allTags'],
                                        'varient_title' => $product['varient_title'],
                                        'varient_list' => $product['varient_list'],
                                        'related_products' => $product['related_products'],
                                        'recommended_products' => $product['recommended_products'],
                                        'grouped' => $product['grouped'],
                                        'rate' => $product['rate'],
                                        'product_parts' => $product['product_parts'],
                                        'created_at' => $product['created_at'],
                                        'updated_at' => $product['updated_at']
                                        );
                       }
                }
                       $results = array (
                            'id' => $promoCategory['id'],    
                            'title' => $promoCategory['title'],
                            'title_ar' => $promoCategory['title_ar'],
                            'photo' => $promoCategory['photo'],
                            'bannerLink' => $promoCategory['bannerLink'],
                            'products' =>$resultss
                        );
            array_push($products_arr["records"], $results);
            echo json_encode($products_arr);
        }
        
    }
}
