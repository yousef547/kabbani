<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index() 
    {
        $sliders = Slider::get();
        $products = Product::get();
        $sellers = Seller::get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        $products = Product::get();
        $sellers = Seller::get();
        return view('admin.slider.create',compact('products','sellers'));
    }

    public function store(SliderRequest $request)
    {
        try
        {    
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('slider',$request->photo);
            }
            Slider::create([
                'seller_id'=>$request->seller_id,
                'product_id'=>$request->product_id,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.productSlider')->with(['success'=>'The slider has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.productSlider')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        $product = Product::findOrFail($id);
        if (!$slider)
            {
                return redirect()->route('admin.productSlider')->with(['error'=>'Sorry, This Slider not found']); 
            } 
        return view('admin.slider.edit',compact('slider','product'));
    }

    public function update($id , SliderRequest $request)
    {
        $slider = Slider::findOrFail($id);
        if(!$slider)
        return redirect()->route('admin.productSlider')->with(['error'=>'Sorry, This Slider not found']); 
    
        // Update data
        Slider::where('id',$id)->update([
            'seller_id'=>$request->seller_id,
            'product_id'=>$request->product_id,
            ]); 

        $filePath = $slider->photo;
        if($request->hasFile('photo'))
        {
        // Image
            $image = Str::after($slider->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('slider',$request->photo);
            Slider::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if(!$slider)
            return redirect()->route('admin.productSlider')->with(['error'=>'Sorry, This Slider not found']);
            
            $image = Str::after($slider->photo, 'assets/'); 
            $image = base_path('assets/'.$image);
            unlink($image);
            
            $slider->delete();
            return redirect()->route('admin.productSlider')->with(['success'=>'The Slider has been deleted successfully']);
    }
}
