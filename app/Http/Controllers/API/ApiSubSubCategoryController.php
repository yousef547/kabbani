<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Traits\GeneralTrait;
use App\Models\Product;
use App\Models\Sub_Sub_Category;

class ApiSubSubCategoryController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $sub_sub = Sub_Sub_Category::get();

        if(!$sub_sub)
        {
            return $this->returnError('400', 'Sorry, The Sub Sub Categories did not found');
        }   
        return $this->returnData('Sub Sub Categories',$sub_sub,'200','Sub Sub Categories has been returned successfully');
    }

    public function getSubCategory($id) 
    {
        $sub_sub = Sub_Sub_Category::get();
        $subCategory = SubCategory::findOrFail($id);
        $result = [];

        foreach($sub_sub as $subSub)
        {
            if($subSub->sub_category_id == $subCategory->id)
            {
		        array_push($result,$subSub);    
            }
        }

        if(!$sub_sub)
        {
            return $this->returnError('400', 'Sorry, The Sub Sub Categories did not found');
        }   
        return $this->returnData('Sub Sub Categories',$result,'200','Sub Sub Categories has been returned successfully');
    } 
    
     public function getProducts($id) 
    {
        $products = Product::get();
        $sub_sub = Sub_Sub_Category::findOrFail($id);
        $result = [];
        foreach ($products as $product)
        {
            if($product->sub_sub_category_id == $sub_sub->id)
            {
                 if($product->product_parts !=null)
                    {
                        
                        $integerIDs = array_map('intval', json_decode($product->product_parts));
            
                        $product['product_parts'] = $integerIDs;
                    }
                else
                    {
                        $product['product_parts'] = [];
                    }
                    
		        array_push($result,$product);    
            }
        }
            return $result;

        if(!$product)
        {
            return $this->returnError('400', 'There are not found any sub category');
        }   
        return $this->returnData('Products',$result,'200','Products returned successfully');
    }
}
