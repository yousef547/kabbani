<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Sub_Sub_Category;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Http\Traits\GeneralTrait;

class ApiSubCategoryController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $subCategories = SubCategory::get();
        $categories = Category::get();
        foreach($subCategories as $subCategory)
        foreach($categories as $category)
        {
            if($subCategory->category_id == $category->id)
            {
                $subCategory->category_name = $category->category_name;
                $subCategory->category_name_ar = $category->category_name_ar;
            }
        }
        
        if(!$subCategories)
        {
            return $this->returnError('400', 'Sorry, The Sub Categories did not found');
        }   
        return $this->returnData('Sub Categories',$subCategories,'200','Sub Categories has been returned successfully');
    }

    public function getProducts($id) 
    {
        $products = Product::get();
        $subCategory = SubCategory::findOrFail($id);
        $result = [];
        foreach ($products as $product)
        
            if($product->sub_category_id == $subCategory->id)
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
		        array_push($result,$product);    
            }
            return $result;

        if(!$product)
        {
            return $this->returnError('400', 'There are not found any sub category');
        }   
        return $this->returnData('Products',$result,'200','Products returned successfully');
    }
    
    public function count()
    {
        $subCategories = SubCategory::get()->count();

        if(!$subCategories)
        {
            return $this->returnError('400', 'Sorry, The Sub Categories Count did not found');
        }   
        return $this->returnData('Sub Categories Count',$subCategories,'200','Sub Categories Count has been returned successfully');
    }
    
    public function show($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        if(!$subCategory)
        {
            return $this->returnError('400', 'Sorry, The Sub Category did not found');
        }   
        return $this->returnData('Sub Category',$subCategory,'200','Sub Category has been returned successfully');
    }

    public function store(SubCategoryRequest $request)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('subCategories',$request->photo);
            }
            $subCategory = SubCategory::create([
                'sub_category_name'=>$request->sub_category_name,
                'sub_category_name_ar'=>$request->sub_category_name_ar,
                'category_id'=>$request->category_id,
                'main_category_id'=>$request->main_category_id, 
                'photo'=>$filePath,
            ]);

            if(!$subCategory)
            {
                return $this->returnError('400', 'Sorry, The Sub Category did not store');
            }   
            return $this->returnData('Sub Category',$subCategory,'200','Sub Category has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function update(SubCategoryRequest $request, $id)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('subCategories',$request->photo);
            }

            $subCategory = SubCategory::where('id',$id)->update([
                'sub_category_name'=>$request->sub_category_name,
                'sub_category_name_ar'=>$request->sub_category_name_ar,
                'category_id'=>$request->category_id,
                'main_category_id'=>$request->main_category_id, 
                'photo'=>$filePath,
            ]);

            if(!$subCategory)
            {
                return $this->returnError('400', 'Sorry, The Sub Category did not update');
            }   
            return $this->returnData('Sub Category',$subCategory,'200','Sub Category has been updated successfully');
    }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function destroy($id)
    {

        $subCategory = SubCategory::findOrFail($id);
        if(!$subCategory)
        return response()->json('Sorry, This Sub Category not found');
        $categories = Category::get();
        foreach ($categories as $category)
        {    
            if($subCategory->category_id == $category->id )
            {
                return response()->json('Sorry, This Sub Category cannot be deleted');
            }
        }
        $subCategory->delete();
        return response()->json('The Sub Category has been deleted successfully');
    }
}