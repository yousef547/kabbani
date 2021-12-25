<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubSubCategoryRequest;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Sub_Sub_Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Sub_Sub_CategoryController extends Controller 
{
    public function index() 
    {
        $sub_sub = Sub_Sub_Category::get();
        $subCategories = SubCategory::get();
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();
        return view('admin.subSubCategory.index',compact('sub_sub','subCategories','categories','mainCategories','sellers'));
    }

    public function create()
    {
        $sub_sub = Sub_Sub_Category::get();
        $sub_categories = SubCategory::get();
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();
        return view('admin.subSubCategory.create',compact('mainCategories','categories','sub_categories','sub_sub','sellers'));
    }

    public function store(SubSubCategoryRequest $request)
    {
        // return $request;
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('subSubCategories',$request->photo);
            }
            $request = Sub_Sub_Category::create([
                'sub_sub_category_name'=>$request->sub_sub_category_name,
                'sub_sub_category_name_ar'=>$request->sub_sub_category_name_ar,
                'sub_category_id'=>$request->sub_category_id,
                'category_id'=>$request->category_id,
                'main_category_id'=>$request->main_category_id,
                'photo'=>$filePath,
            ]);
            
            return redirect()->route('admin.subSubCategories')->with(['success'=>'The Sub Sub Category has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.subSubCategories')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $sub_sub = Sub_Sub_Category::findOrFail($id);
        $subCategories = SubCategory::get();
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();

        if (! $sub_sub)
            {
                return redirect()->route('admin.subSubCategories')->with(['error'=>'Sorry, This Sub Sub Category not found']); 
            } 
            return view('admin.subSubCategory.edit', compact('sub_sub','subCategories','categories','sellers','mainCategories'));    
    }

    public function update($id , SubSubCategoryRequest $request) 
    {

        $sub_sub = Sub_Sub_Category::findOrFail($id);

        if(!$sub_sub)
        return redirect()->route('admin.subSubCategories')->with(['error'=>'Sorry, This Sub Sub Category not found']); 
        
        // Update data
        Sub_Sub_Category::where('id',$id)->update([
                'sub_sub_category_name'=>$request->sub_sub_category_name,
                'sub_sub_category_name_ar'=>$request->sub_sub_category_name_ar,
                'sub_category_id'=>$request->sub_category_id,
                'category_id'=>$request->category_id,
                'main_category_id'=>$request->main_category_id,
            ]);

        if($request->hasFile('photo'))
        {
            $image = Str::after($sub_sub->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('subSubCategories',$request->photo);

            Sub_Sub_Category::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }

        return redirect()->route('admin.subSubCategories')->with(['success'=>'The Sub Sub Category has been modified successfully']); 

    }
    public function destroy($id)
    {
        $sub_sub = Sub_Sub_Category::findOrFail($id);
        if(!$sub_sub)
        return redirect()->route('admin.subSubCategories')->with(['error'=>'Sorry, This Sub Sub Category not found']);

        $image = Str::after($sub_sub->photo, 'assets/');
        $image = base_path('assets/'.$image);
        unlink($image);
        
        $products = Product::get();
            if(isset($products) && $products->count() > 0 )
            {
                return redirect()->route('admin.subSubCategories')->with(['error'=>'Sorry, This Sub Sub Category cannot be deleted']);
            }
        $sub_sub->delete();  
            return redirect()->route('admin.subSubCategories')->with(['success'=>'The Sub Sub Category has been deleted successfully']);
    }
}
