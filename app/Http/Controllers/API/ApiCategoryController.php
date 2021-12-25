<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\MainCategory;
use App\Http\Traits\GeneralTrait;
use App\Models\Product;
use App\Models\SubCategory;

class ApiCategoryController extends Controller
{
    use GeneralTrait;

    public function index()
    {        
        $categories = Category::get();
        
        if(!$categories)
        {
            return $this->returnError('400', 'There are not found any categories');
        }   
        return $this->returnData('Categories',$categories,'200','Categories returned successfully');
    }
    
     public function getProducts($id) 
    {
        $products = Product::get();
        $category = Category::findOrFail($id);
        $result = [];
        foreach ($products as $product)
            if($product->category_id == $category->id)
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
            return $result;

        if(!$product)
        {
            return $this->returnError('400', 'There are not found any category');
        }   
        return $this->returnData('Products',$result,'200','Categories returned successfully');
    }

    public function count()
    {
        $categories = Category::get()->count();
        
        if(!$categories)
        {
            return $this->returnError('400', 'There are not found any categories');
        }   
        return $this->returnData('Categories',$categories,'200','Categories Count returned successfully');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = SubCategory::get();
        foreach ($subCategories as $SubCategory) {
            if ($SubCategory->category_id == $category->id) {

        if(!$category)
        {
            return $this->returnError('400', 'Sorry, This Category not found');
        }   
        return $this->returnData('Category',$category,'200','Category returned successfully');
        return $this->returnData('Sub Category',$SubCategory,'200','Sub Category returned successfully');
            }
        }

    }

    public function store(CategoryRequest $request)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('categories',$request->photo);
            }
            $category = Category::create([
                'category_name'=>$request->category_name,
                'category_name_ar'=>$request->category_name_ar,
                'main_category_id'=>$request->main_category_id,
                'photo'=>$filePath,
            ]);

            if(!$category)
        {
            return $this->returnError('400', 'Sorry, This Category did not stored');
        }   
        return $this->returnData('Category',$category,'200','Category has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try
        {
            $category = Category::findOrFail($id);

            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('categories',$request->photo);
            }

            // Update data
            $category = Category::where('id',$id)->update([
                'category_name'=>$request->category_name,
                'category_name_ar'=>$request->category_name_ar,
                'main_category_id'=>$request->main_category_id,
                'photo'=>$filePath,
            ]);

            if(!$category)
            {
                return $this->returnError('400', 'Sorry, This Category did not updated');
            }   
            return $this->returnData('Category',$category,'200','Category has been updated successfully');
        }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        if(!$category)
        return response()->json('Sorry, This Category not found');
        $mainCategories = MainCategory::get();
        foreach ($mainCategories as $mainCategory)
        {    
            if($category->main_category_id == $mainCategory->id )
            {
                return response()->json('Sorry, This Category cannot be deleted');
            }
        }
        $category->delete();
        return response()->json('The Category has been deleted successfully');
    }
}
