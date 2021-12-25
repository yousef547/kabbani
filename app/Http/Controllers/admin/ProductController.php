<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductTags;
use App\Models\Seller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::get()->where('active','1');
        $sellers = Seller::get();
        $mainCategories = MainCategory::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();

        return view('admin.Product.index',compact('sellers','categories','mainCategories','subCategories','products'));
    }

    public function create() 
    {
        $sellers = Seller::get();
        $products = Product::get();
        $productTags = ProductTags::get();
        $tags = Tag::get();
        $mainCategories = MainCategory::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('admin.Product.create',compact('sellers','categories','mainCategories','subCategories','tags','products','productTags'));
    }

    public function store(Request $request)
    {
        try
        {    
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('products',$request->photo);
            }
            
            // dd($request);
            $request = Product::create([
                'product_name'=>$request->product_name,
                'name_ar'=>$request->name_ar,
                'main_category_id'=>$request->main_category_id,
                'seller_id'=>$request->seller_id,
                'category_id'=>$request->category_id,
                'sub_category_id'=>$request->sub_category_id,
                'quant'=>$request->quant,
                'min_quant'=>$request->min_quant,
                'price'=>$request->price,
                'compare_price'=>$request->compare_price,
                'warranty'=>$request->warranty,
                'description'=>$request->description,
                'description_ar'=>$request->description_ar,
                'specification'=>$request->specification,
                'specification_ar'=>$request->specification_ar,
                'deliv_time'=>$request->deliv_time,
                'deliv_free'=>$request->deliv_free,
                'active'=>$request->active,
                'photo'=>$filePath,
                'grouped'=>$request->grouped,
                'product_parts'=>json_encode($request->product_parts),
                'productTag_id'=>json_encode($request->productTag_id),
                'deals'=>$request->deals,
                'deals_price'=>$request->deals_price,
                ]);
            return redirect()->route('admin.products')->with(['success'=>'The Product has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $tags = Tag::get();
        $product = Product::findOrFail($id);
        $productTags = ProductTags::get();
        $products = Product::get();
        $sellers = Seller::get();
        $mainCategories = MainCategory::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        
        if (! $product)
            {
                return redirect()->route('admin.products')->with(['error'=>'Sorry, This Product not found']); 
            } 
        return view('admin.Product.edit',compact('product', 'products' , 'tags' , 'sellers' , 'mainCategories' , 'subCategories' ,'categories','productTags'));
    }

    public function update($id , ProductRequest $request)
    {
        try {
        $product = Product::findOrFail($id);

        if(!$product)
        return redirect()->route('admin.products')->with(['error'=>'Sorry, This Product not found']); 

            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('products',$request->photo);
            }
        // Update data
            $request = Product::where('id',$id)->update([
                'product_name'=>$request->product_name,
                'name_ar'=>$request->name_ar,
                'main_category_id'=>$request->main_category_id,
                'seller_id'=>$request->seller_id,
                'category_id'=>$request->category_id,
                'sub_category_id'=>$request->sub_category_id,
                'quant'=>$request->quant,
                'min_quant'=>$request->min_quant,
                'price'=>$request->price,
                'compare_price'=>$request->compare_price,
                'warranty'=>$request->warranty,
                'description'=>$request->description,
                'description_ar'=>$request->description_ar,
                'specification'=>$request->specification,
                'specification_ar'=>$request->specification_ar,
                'deliv_time'=>$request->deliv_time,
                'deliv_free'=>$request->deliv_free,
                'active'=>$request->active,
                'deals'=>$request->deals,
                'deals_price'=>$request->deals_price,
                'grouped'=>$request->grouped,
                'product_parts'=>json_encode($request->product_parts),
                'productTag_id'=>json_encode($request->productTag_id),
                'photo'=>$filePath,
            ]);

        return redirect()->route('admin.products')->with(['success'=>'The Product has been modified successfully']); 
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if(!$product)
        return redirect()->route('admin.products')->with(['error'=>'Sorry, This Product not found']); 
    
        // Change Status
        $status = $product->active == 0 ? 1 : 0 ;
        $product -> update(['active' => $status]);
        return redirect()->route('admin.products')->with(['success'=>'The Status has been Changed successfully']);

    }

    public function deals()
    {
        
        $products = Product::get()->where('deals','1');
        $sellers = Seller::get();
        $mainCategories = MainCategory::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('admin.Product.deals',compact('sellers','categories','mainCategories','subCategories','products'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(!$product)
            return redirect()->route('admin.products')->with(['error'=>'Sorry, This Product not found']);
        $product->delete();  
            return redirect()->route('admin.products')->with(['success'=>'The Product has been deleted successfully']);
    }

    // public function process(Tag $tag, Request $request)
    // {
    //     $tag->allTags = json_encode($request->allTags);
    //     $tag->save();
    //     return $tag;
    // }
}
