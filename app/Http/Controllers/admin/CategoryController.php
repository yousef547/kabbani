<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() 
    {
        $sellers = Seller::get();
        $categories = Category::orderBy('id', 'ASC')->get();
        $main_categories = MainCategory::get();
        return view('admin.category.index',compact('categories','main_categories','sellers'));
    }

    public function create()
    {
        $sellers = Seller::get();
        $categories = Category::get();
        $main_categories = MainCategory::get();
        return view('admin.category.create',compact('categories','main_categories','sellers'));
    }

    public function store(CategoryRequest $request)
    {
        // return $request;
        try
        {
            $filePath = "";
            if($request->has('photo')) 
            {
                $filePath=uploadImage('categories',$request->photo);
            }
            Category::create([
                'category_name'=>$request->category_name,
                'category_name_ar'=>$request->category_name_ar,
                'main_category_id'=>$request->main_category_id,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.categories')->with(['success'=>'The Category has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.categories')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $main_categories = MainCategory::get();

        if (! $category)
            {
                return redirect()->route('admin.categories')->with(['error'=>'Sorry, This Category not found']); 
            } 
            return view('admin.category.edit', compact('category','main_categories'));    
    }

    public function update($id , CategoryRequest $request) 
    {

        $category = Category::findOrFail($id);

        if(!$category)
        return redirect()->route('admin.categories')->with(['error'=>'Sorry, This Category not found']); 
    
        // Update data
        Category::where('id',$id)->update([
            'category_name'=>$request->category_name,
            'category_name_ar'=>$request->category_name_ar,
        ]);

        if($request->hasFile('photo'))
        {
            $image = Str::after($category->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('categories',$request->photo);
            Category::where('id',$id)->update([
                'photo'=>$filePath,
            ]); 
        }

        return redirect()->route('admin.categories')->with(['success'=>'The Category has been modified successfully']); 

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(!$category)
        return redirect()->route('admin.categories')->with(['error'=>'Sorry, This Category not found']);
        $products = Product::get();
        if(isset($products) && $products->count() > 0 )
        {
            return redirect()->route('admin.categories')->with(['error'=>'Sorry, This Category cannot be deleted']);
        }
        $image = Str::after($category->photo, 'assets/');
        $image = base_path('assets/'.$image);
        unlink($image);
        $category->delete();  
            return redirect()->route('admin.categories')->with(['success'=>'The Category has been deleted successfully']);
    }
}
