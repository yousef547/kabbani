<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\ProductTags;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use App\Models\Images;
use App\Http\Traits\GeneralTrait;

class ApiProductController extends Controller
{
    use GeneralTrait;

 public function index()
    {       
        $products = Product::get();
        $subCategories = SubCategory::get();
        $tags = ProductTags::get();
        $resultss = [];

        foreach ($products as $product) 
            {
                if($product->product_parts !=null)
                    {
                        $explode_id1 = json_decode($product->product_parts, true);
                        $product['product_parts'] = $explode_id1;
                    }
                else
                    {
                        $product['product_parts'] = [];
                    }
                    
                if($product->productTag_id !=null)
                    {
                        $explode_id = json_decode($product->productTag_id, true);
                        $product['productTag_id'] = $explode_id;
                        for($i = 0 ; $i < count($product['productTag_id']) ; $i++)
                            {
                            
                            foreach($tags as $tag)
                               if($tag->id == $product['productTag_id'][$i])
                                {
                                    $resultss[] = array (
                                        'id' => $tag['id'],    
                                        'tag' => $tag['tag'],
                                        'tag_ar' => $tag['tag_ar'],
                                        'color' => $tag['color'],
                                        'active' => $tag['active'],
                                    );
                                }
                            }
                        $product['productTag_id'] = $resultss;
                    }
                    
                else
                    {
                        $product['productTag_id'] = [];
                    }
                
            foreach ($subCategories as $subCategory) 
                if($subCategory->id == $product->sub_category_id)
                    {
                        $product->sub_category_name = $subCategory->sub_category_name;
                        $product->sub_category_name_ar = $subCategory->sub_category_name_ar;
                    }
                }

        if(!$products)
        {
            return $this->returnError('400', 'Sorry, The Products did not found');
        }   
        return $this->returnData('Products',$products,'200','Products has been returned successfully');
    }
    
    public function index2($count)
    {
            // $products = Product::get();
            // foreach($products as  $product)
            
            // $images = Images::get();
            // $image_path = array();
            // foreach($images as  $image)
            // {
            //     array_push($image_path,$image);
            // }
            // if ($product->id == $image->product_id)
            
            // return $product[image_path];
            
           $products = Product::orderBy('id')->simplePaginate($count);
           $productTags = ProductTags::get(); 
           $subCategories = SubCategory::get();
            
           foreach ($products as $product) 
            {
                if($product->product_parts !=null)
                    {
                        $explode_id1 = json_decode($product->product_parts, true);
                        $product['product_parts'] = $explode_id1;
                    }
                else
                    {
                        $product['product_parts'] = [];
                    }
                // if($product->varient_list !=null)
                //     {
                //         $explode_id2 = json_decode($product->varient_list, true);
                //         $product['varient_list'] = $explode_id2;
                //     }
                // else
                //     {
                //         $product['varient_list'] = [];
                //     }
                // if($product->allTags !=null)
                //     {
                //         $explode_id3 = json_decode($product->allTags, true);
                //         $product['allTags'] = $explode_id3;
                //     }
                // else
                //     {
                //         $product['allTags'] = [];
                //     }
                if($product->productTag_id !=null)
                    {
                        $explode_id = json_decode($product->productTag_id, true);
                        $product['productTag_id'] = $explode_id;
                    }
                else
                    {
                        $product['productTag_id'] = [];
                    }
                
            foreach ($subCategories as $subCategory) 
                if($subCategory->id == $product->sub_category_id)
                    {
                        $product->sub_category_name = $subCategory->sub_category_name;
                        $product->sub_category_name_ar = $subCategory->sub_category_name_ar;
                    }
                }
           
            // $products = DB::table('products')
            // ->leftJoin('variants', 'products.id', '=', 'variants.product_id')
            // ->leftJoin('images', 'products.id', '=', 'images.product_id')
            // ->select('products.*', 'images.image_path' , 'variants.variant_type' , 'variants.variant' , 'variants.variantPhoto' , 'variants.newPrice')
            // ->get();
            
           
        // $products = Product::get();

        if(!$products)
        {
            return $this->returnError('400', 'Sorry, The Products did not found');
        }   
        return $this->returnData('Products',$products,'200','Products has been returned successfully');
    }

    public function deals($count)
    {
        $products = Product::where('deals','1')->orderBy('id')->simplePaginate($count);;
        $subCategories = SubCategory::get();
            
             foreach ($products as $product) 
            {
                if($product->product_parts !=null)
                    {
                        $explode_id1 = json_decode($product->product_parts, true);
                        $product['product_parts'] = $explode_id1;
                    }
                else
                    {
                        $product['product_parts'] = [];
                    }
                // if($product->varient_list !=null)
                //     {
                //         $explode_id2 = json_decode($product->varient_list, true);
                //         $product['varient_list'] = $explode_id2;
                //     }
                // else
                //     {
                //         $product['varient_list'] = [];
                //     }
                // if($product->allTags !=null)
                //     {
                //         $explode_id3 = json_decode($product->allTags, true);
                //         $product['allTags'] = $explode_id3;
                //     }
                // else
                //     {
                //         $product['allTags'] = [];
                //     }
                if($product->productTag_id !=null)
                    {
                        $explode_id = json_decode($product->productTag_id, true);
                        $product['productTag_id'] = $explode_id;
                    }
                else
                    {
                        $product['productTag_id'] = [];
                    }
                
            foreach ($subCategories as $subCategory) 
                if($subCategory->id == $product->sub_category_id)
                    {
                        $product->sub_category_name = $subCategory->sub_category_name;
                        $product->sub_category_name_ar = $subCategory->sub_category_name_ar;
                    }
                }

        if(!$products)
        {
            return $this->returnError('400', 'Sorry, The Products did not found');
        }   
        return $this->returnData('Deals',$products,'200','Deals Products has been returned successfully');
    }

    public function count()
    {
        $products = Product::get()->count();

        if(!$products)
        {
            return $this->returnError('400', 'Sorry, The Products Count did not found');
        }   
        return $this->returnData('Products Total',$products,'200','Products Count has been returned successfully');
    }

    public function show($id)
    {
        $productTags = ProductTags::get(); 
        $subCategories = SubCategory::get();
        $product = Product::findOrFail($id);
                    
             if($product->product_parts !=null)
                    {
                        $explode_id1 = json_decode($product->product_parts, true);
                        $product['product_parts'] = $explode_id1;
                    }
                else
                    {
                        $product['product_parts'] = [];
                    }
                // if($product->varient_list !=null)
                //     {
                //         $explode_id2 = json_decode($product->varient_list, true);
                //         $product['varient_list'] = $explode_id2;
                //     }
                // else
                //     {
                //         $product['varient_list'] = [];
                //     }
                // if($product->allTags !=null)
                //     {
                //         $explode_id3 = json_decode($product->allTags, true);
                //         $product['allTags'] = $explode_id3;
                //     }
                // else
                //     {
                //         $product['allTags'] = [];
                //     }
                if($product->productTag_id !=null)
                    {
                        $explode_id = json_decode($product->productTag_id, true);
                        $product['productTag_id'] = $explode_id;
                    }
                else
                    {
                        $product['productTag_id'] = [];
                    }
            foreach ($subCategories as $subCategory) 
                        if($subCategory->id == $product->sub_category_id)
                        {
                            $product->sub_category_name = $subCategory->sub_category_name;
                            $product->sub_category_name_ar = $subCategory->sub_category_name_ar;
                        }
                

        if(!$product)
        {
            return $this->returnError('400', 'Sorry, This Product did not found');
        }   
        return $this->returnData('Product',$product,'200','Product has been returned successfully');
    }
    
    public function byVariant($variant)
    {
        $productTags = ProductTags::get(); 
        $subCategories = SubCategory::get();
        $product = Product::where('varient_title',$variant)->get();

        if(!$product)
        {
            return $this->returnError('400', 'Sorry, This Product did not found');
        }   
        return $this->returnData('Product',$product,'200','Product has been returned successfully');
    }
    
    public function priceRange($min_price , $max_price)
    {
        $productTags = ProductTags::get(); 
        $subCategories = SubCategory::get();
        $products = Product::whereBetween('price', [$min_price, $max_price])->get();

        if(!$products)
        {
            return $this->returnError('400', 'Sorry, This Products Range did not found');
        }   
        return $this->returnData('Products',$products,'200','Product has been returned successfully');
    }
}
