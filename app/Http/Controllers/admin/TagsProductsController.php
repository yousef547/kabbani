<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagsProductsRequest;
use App\Models\Product;
use App\Models\ProductTags;
use App\Models\TagsProducts;
use Illuminate\Http\Request;

class TagsProductsController extends Controller
{
    public function index() 
    {
        $tagsProducts = TagsProducts::get();
        $products = Product::get();
        $tags = ProductTags::get();
        return view('admin.tagsProducts.index',compact('products','tagsProducts','tags'));
    }

    public function create()
    {
        $tagsProduct = TagsProducts::get();
        $products = Product::get();
        $tags = ProductTags::get();

        return view('admin.tagsProducts.create',compact('products','tagsProduct','tags'));
    }

    public function store(TagsProductsRequest $request)
    {
        // return $request;
        try
        {
            TagsProducts::create([
                'product_id'=>$request->product_id,
                'tagsProducts'=>json_encode($request->tagsProducts),
            ]);
            return redirect()->route('admin.tagsProducts')->with(['success'=>'The Tags Product has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.tagsProducts')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $tagsProduct = TagsProducts::findOrFail($id);
        $products = Product::get();
        $tags = ProductTags::get();

        if (! $tagsProduct)
            {
                return redirect()->route('admin.tagsProducts')->with(['error'=>'Sorry, This Tags Product not found']); 
            } 
            return view('admin.tagsProducts.edit', compact('products','tagsProduct','tags'));    
    }

    public function update($id , TagsProductsRequest $request) 
    {

        $tagsProduct = TagsProducts::findOrFail($id);

        if(!$tagsProduct)
        return redirect()->route('admin.tagsProducts')->with(['error'=>'Sorry, This Tags Product not found']); 

        // Update data
        TagsProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'tagsProducts'=>json_encode($request->tagsProducts),
        ]);

        return redirect()->route('admin.tagsProducts')->with(['success'=>'The Tags Product has been modified successfully']); 
    }
    
    public function destroy($id)
    {
        $tagsProduct = TagsProducts::findOrFail($id);

        if(!$tagsProduct)
        return redirect()->route('admin.tagsProducts')->with(['error'=>'Sorry, This Tags Product not found']);

        $tagsProduct->delete();  
        return redirect()->route('admin.tagsProducts')->with(['success'=>'The Tags Product has been deleted successfully']);
    }
}
