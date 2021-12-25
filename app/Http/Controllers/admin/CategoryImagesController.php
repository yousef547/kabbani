<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryImagesRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryImages;
use Illuminate\Support\Str;

class CategoryImagesController extends Controller
{
    public function index() 
    {
        $categoryImages = CategoryImages::get();
        $categories = Category::get();
        $products = Product::get();
        return view('admin.category_images.index',compact('categoryImages','categories','products'));
    }

    public function create()
    {
        $categories = Category::get();
        $products = Product::get();
        return view('admin.category_images.create',compact('categories','products'));
    }

    public function store(CategoryImagesRequest $request)
    {
        try
        {    
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('categoryImages',$request->photo);
            }
            CategoryImages::create([
                'category_id'=>$request->category_id,
                'product_id'=>$request->product_id,
                'image_name'=>$request->image_name,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.categorySlider')->with(['success'=>'The slider has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.categorySlider')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $categoryImage = CategoryImages::findOrFail($id);
        $categories = Category::get();
        $products = Product::get();
        
        if (!$categoryImage)
            {
                return redirect()->route('admin.categorySlider')->with(['error'=>'Sorry, This Slider not found']); 
            } 
        return view('admin.category_images.edit',compact('categoryImage','categories','products'));
    }

    public function update($id , CategoryImagesRequest $request)
    {
        $categoryImage = CategoryImages::findOrFail($id);
        if(!$categoryImage)
        return redirect()->route('admin.categorySlider')->with(['error'=>'Sorry, This Slider not found']); 
    
        // Update data
        CategoryImages::where('id',$id)->update([
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'image_name'=>$request->image_name,
            ]); 

        $filePath = $categoryImage->photo;
        if($request->hasFile('photo'))
        {
        // Image
            $image = Str::after($categoryImage->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('categoryImages',$request->photo);
            CategoryImages::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.categorySlider')->with(['error'=>'Sorry, This Slider not found']); 
    }

    public function destroy($id)
    {
        $categoryImage = CategoryImages::findOrFail($id);
        if(!$categoryImage)
            return redirect()->route('admin.categorySlider')->with(['error'=>'Sorry, This Slider not found']);
            
            $image = Str::after($categoryImage->photo, 'assets/'); 
            $image = base_path('assets/'.$image);
            unlink($image);
            
            $categoryImage->delete();
            return redirect()->route('admin.categorySlider')->with(['success'=>'The Slider has been deleted successfully']);
    }
}

