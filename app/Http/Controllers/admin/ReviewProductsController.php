<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewProductRequest;
use App\Models\Product;
use App\Models\ReviewProducts;
use Illuminate\Http\Request;

class ReviewProductsController extends Controller
{
    public function index() 
    {
        $customers = Customer::get();
        $products = Product::get();
        $review_products = ReviewProducts::get();
        return view('admin.review_product.index',compact('review_products','products','customers'));
    }

    public function create() 
    {
        $customers = Customer::get();
        $products = Product::get();
        $review_products = ReviewProducts::get();
        return view('admin.review_product.create',compact('products','review_products','customers'));
    }

    public function store(ReviewProductRequest $request)
    {
        // return $request;
        try
        {            
            ReviewProducts::create([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                'review_num'=>$request->review_num,
                'review_comment'=>$request->review_comment,
            ]);
            return redirect()->route('admin.review_products')->with(['success'=>'The Review Products has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.review_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $review_product = ReviewProducts::findOrFail($id);
        $products = Product::get();

        if (! $review_product)
            {
                return redirect()->route('admin.review_products')->with(['error'=>'Sorry, This Review Products not found']); 
            } 
            return view('admin.review_product.edit', compact('review_product','products'));    
    }

    public function update($id , ReviewProductRequest $request) 
    {
        // return $request;
        $review_product = ReviewProducts::findOrFail($id);
        if(!$review_product)
        return redirect()->route('admin.review_products')->with(['error'=>'Sorry, This Review Products not found']); 

        // Update data
        $request = ReviewProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'related_products'=>json_encode($request->related_products)
        ]);
        return redirect()->route('admin.review_products')->with(['success'=>'The Review Products has been modified successfully']); 
    }

    public function destroy($id)
    {
        $review_product = ReviewProducts::findOrFail($id);
        $review_product->delete();
        return redirect()->route('admin.review_products')->with(['success'=>'The Review Products has been deleted successfully']);
    }
}
