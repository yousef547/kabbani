<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatedProductsRequest;
use App\Models\Product;
use App\Models\RelatedProducts;
use Illuminate\Http\Request;

class RelatedProductsController extends Controller
{
    public function index() 
    {
        $products = Product::get();
        $related_products = RelatedProducts::get();
        return view('admin.related_product.index',compact('related_products','products'));
    }

    public function create() 
    {
        $products = Product::get();
        $related_products = RelatedProducts::get();
        return view('admin.related_product.create',compact('products','related_products'));
    }

    public function store(RelatedProductsRequest $request)
    {
        // return $request;
        try
        {            
            RelatedProducts::create([
                'product_id'=>$request->product_id,
                'related_products'=>json_encode($request->related_products)
            ]);
            return redirect()->route('admin.related_products')->with(['success'=>'The Related Products has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.related_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $related_product = RelatedProducts::findOrFail($id);
        $products = Product::get();

        if (! $related_product)
            {
                return redirect()->route('admin.related_products')->with(['error'=>'Sorry, This Related Products not found']); 
            } 
            return view('admin.related_product.edit', compact('related_product','products'));    
    }

    public function update($id , RelatedProductsRequest $request) 
    {
        // return $request;
        $related_product = RelatedProducts::findOrFail($id);
        if(!$related_product)
        return redirect()->route('admin.related_products')->with(['error'=>'Sorry, This Related Products not found']); 

        // Update data
        $request = RelatedProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'related_products'=>json_encode($request->related_products)
        ]);
        return redirect()->route('admin.related_products')->with(['success'=>'The Related Products has been modified successfully']); 
    }

    public function destroy($id)
    {
        $related_product = RelatedProducts::findOrFail($id);
        $related_product->delete();
        return redirect()->route('admin.related_products')->with(['success'=>'The Related Products has been deleted successfully']);
    }

}
