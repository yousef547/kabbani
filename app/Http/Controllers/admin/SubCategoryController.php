<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index() 
    {
        $subCategories = SubCategory::get();
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();
        return view('admin.subCategory.index',compact('subCategories','categories','mainCategories','sellers'));
    }

    public function create()
    {
        $sub_categories = SubCategory::get();
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();
        return view('admin.subCategory.create',compact('categories','sub_categories','mainCategories','sellers'));
    }

    public function store(SubCategoryRequest $request)
    {
        // return $request;
        try
        {
            if($request->has('photo'))
            $filePath = "";
            {
                $filePath=uploadImage('subCategories',$request->photo);
            }
            SubCategory::create([
                'sub_category_name'=>$request->sub_category_name,
                'sub_category_name_ar'=>$request->sub_category_name_ar,
                'category_id'=>$request->category_id,
                'main_category_id'=>$request->main_category_id,
                'active'=>$request->active,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.subCategories')->with(['success'=>'The Sub Category has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.subCategories')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::get();
        $mainCategories = MainCategory::get();
        $sellers = Seller::get();

        if (! $subCategory)
            {
                return redirect()->route('admin.subCategories')->with(['error'=>'Sorry, This Sub Category not found']); 
            } 
            return view('admin.subCategory.edit', compact('subCategory','categories','sellers','mainCategories'));    
    }

    public function update($id , SubCategoryRequest $request) 
    {

        $subCategory = SubCategory::findOrFail($id);

        if(!$subCategory)
        return redirect()->route('admin.subCategories')->with(['error'=>'Sorry, This Sub Category not found']); 

        // Update data
        SubCategory::where('id',$id)->update([
            'sub_category_name'=>$request->sub_category_name,
            'sub_category_name_ar'=>$request->sub_category_name_ar,
            'category_id'=>$request->category_id,
            'main_category_id'=>$request->main_category_id, 
            'active'=>$request->active,
        ]);

        if($request->hasFile('photo'))
        {
            $image = Str::after($subCategory->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('subCategories',$request->photo);
            SubCategory::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }

        return redirect()->route('admin.subCategories')->with(['success'=>'The Sub Category has been modified successfully']); 
    }
    
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        if(!$subCategory)
        return redirect()->route('admin.subCategories')->with(['error'=>'Sorry, This Sub Category not found']);
        $image = Str::after($subCategory->photo, 'assets/');
        $image = base_path('assets/'.$image);
        unlink($image);
        $products = Product::get();
        if(isset($products) && $products->count() > 0 )
        {
            return redirect()->route('admin.subCategories')->with(['error'=>'Sorry, This Sub Category cannot be deleted']);
        }
        $subCategory->delete();  
            return redirect()->route('admin.subCategories')->with(['success'=>'The Sub Category has been deleted successfully']);
    }

    public function changeStatus($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        if(!$subCategory)
        return redirect()->route('admin.subCategories')->with(['error'=>'Sorry, This Sub Category not found']); 
    
        // Change Status
        $status = $subCategory->active == 0 ? 1 : 0 ;
        $subCategory -> update(['active' => $status]);
        return redirect()->route('admin.subCategories')->with(['success'=>'The Status has been Changed successfully']);

    }
}
