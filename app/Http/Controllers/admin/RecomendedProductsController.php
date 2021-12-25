<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecomendedProductRequest;
use App\Models\Product;
use App\Models\RecomendedProducts;

class RecomendedProductsController extends Controller
{
    public function index() 
    {
        $products = Product::get();
        $recommended_products = RecomendedProducts::get();
        return view('admin.recommended_products.index',compact('recommended_products','products'));
    }

    public function create() 
    {
        $products = Product::get();
        $recommended_products = RecomendedProducts::get();
        return view('admin.recommended_products.create',compact('products','recommended_products'));
    }

    public function store(RecomendedProductRequest $request)
    {
        // return $request;
        try
        {            
            RecomendedProducts::create([
                'product_id'=>$request->product_id,
                'recommended_products'=>json_encode($request->recommended_products)
            ]);
            return redirect()->route('admin.recommended_products')->with(['success'=>'The Recommend Products has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.recommended_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $recommend_product = RecomendedProducts::findOrFail($id);
        $products = Product::get();

        if (! $recommend_product)
            {
                return redirect()->route('admin.recommended_products')->with(['error'=>'Sorry, This Recommend Products not found']); 
            } 
            return view('admin.recommended_products.edit', compact('recommend_products','products'));    
    }

    public function update($id , RecomendedProductRequest $request) 
    {
        // return $request;
        $recommend_product = RecomendedProducts::findOrFail($id);
        if(!$recommend_product)
        return redirect()->route('admin.recommended_products')->with(['error'=>'Sorry, This Recommend Products not found']); 

        // Update data
        $request = RecomendedProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'recommended_products'=>json_encode($request->recommended_products)
        ]);
        return redirect()->route('admin.recommended_products')->with(['success'=>'The Recommend Products has been modified successfully']); 
    }

    public function destroy($id)
    {
        $recommend_product = RecomendedProducts::findOrFail($id);
        $recommend_product->delete();
        return redirect()->route('admin.recommended_products')->with(['success'=>'The Recommend Products has been deleted successfully']);
    }

}
