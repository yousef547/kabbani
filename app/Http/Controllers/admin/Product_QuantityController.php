<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product_QuantityRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class Product_QuantityController extends Controller
{
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        if (! $product)
            {
                return redirect()->route('admin.dashboard')->with(['error'=>'Sorry, This Product not found']); 
            } 
        return view('admin.quantity.edit',compact('product'));
    }

    public function update($id , Product_QuantityRequest $request)
    {
        try {
        $product = Product::findOrFail($id);

        if(!$product)
        return redirect()->route('admin.dashboard')->with(['error'=>'Sorry, This Product not found']); 

        // Update data
        Product::find($id)->increment('quant',$request->quant);

        return redirect()->route('admin.dashboard')->with(['success'=>'The Quantity has been modified successfully']); 
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }
}
