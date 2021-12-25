<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Variant;
use App\Http\Requests\VariantRequest;



class VariantController extends Controller
{
    public function index() 
    {
        $variants = Variant::get();
        $products = Product::get();
        return view('admin.variants.index',compact('products','variants'));
    }

    public function create()
    {
        $variants = Variant::get();
        $products = Product::get();
        return view('admin.variants.create',compact('products','variants'));
    }

    public function store(VariantRequest $request)
    {
        // return $request;
        try
        {
            // return $request;
            
             $filePath = "";
             if($request->has('photo'))
            {
                $filePath=uploadImage('variants',$request->photo);
            }
            
            Variant::create([
                'product_id'=>$request->product_id,
                'variant_type'=>$request->variant_type,
                'variant_id'=>$request->variant_id,
                'variant'=>$request->variant,
                'newPrice'=>$request->newPrice,
                'comparePrice'=>$request->comparePrice,
                'sku'=>$request->sku,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.variants')->with(['success'=>'The variant has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.variants')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $variant = Variant::findOrFail($id);
        $products = Product::get();

        if (! $variant)
            {
                return redirect()->route('admin.variants')->with(['error'=>'Sorry, This variant not found']); 
            } 
            return view('admin.variants.edit', compact('products','variant'));    
    }

    public function update($id , VariantRequest $request) 
    {

        $variant = Variant::findOrFail($id);

        if(!$variant)
        return redirect()->route('admin.variants')->with(['error'=>'Sorry, This variant not found']); 

        // Update data
         $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('variants',$request->photo);
            }
            
        Variant::where('id',$id)->update([
                'product_id'=>$request->product_id,
                'variant_type'=>$request->variant_type,
                'variant_id'=>$request->variant_id,
                'variant'=>$request->variant,
                'newPrice'=>$request->newPrice,
                'comparePrice'=>$request->comparePrice,
                'sku'=>$request->sku,
                'photo'=>$filePath,
        ]);


        return redirect()->route('admin.variants')->with(['success'=>'The variant has been modified successfully']); 
    }
    
    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);

        if(!$variant)
        return redirect()->route('admin.variants')->with(['error'=>'Sorry, This variant not found']);

        $image = Str::after($variant->photo, 'assets/');
        $image = base_path('assets/'.$image);
        unlink($image);

        $variant->delete();  
        return redirect()->route('admin.variants')->with(['success'=>'The variant has been deleted successfully']);
    }
}
