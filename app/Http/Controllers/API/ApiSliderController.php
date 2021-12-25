<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Slider;

class ApiSliderController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $sliders = Slider::get();
        
        if(!$sliders)
        {
            return $this->returnError('400', 'Sorry, The Sliders did not found');
        }   
        return $this->returnData('Sliders',$sliders,'200','Sliders has been returned successfully');
    }

    public function count()
    {
        $sliders = Slider::get()->count();
    
        if(!$sliders)
        {
            return $this->returnError('400', 'Sorry, The Sliders count did not found');
        }   
        return $this->returnData('Sliders Count',$sliders,'200','Sellers count has been returned successfully');
    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        
        if(!$slider)
        {
            return $this->returnError('400', 'Sorry, This Slider did not found');
        }   
        return $this->returnData('Slider',$slider,'200','Slider has been returned successfully');
    }

    public function store(SliderRequest $request)
    {
        try
        {    
            $slider = Slider::create([
                'seller_id'=>$request->seller_id,
                'product_id'=>$request->product_id,
                'photo'=>$request->photo,
            ]);

            if(!$slider)
                {
                    return $this->returnError('400', 'Sorry, This Slider did not stored');
                }   
                return $this->returnData('Slider',$slider,'200','Slider has been stored successfully');
        }
        catch (\Exception $ex)
        {
            return $ex;
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }
    }

    public function update($id , SliderRequest $request)
    {
        try
        {    
            $slider = Slider::where('id' , $id)->update([
                'seller_id'=>$request->seller_id,
                'product_id'=>$request->product_id,
                'photo'=>$request->photo,
            ]);

            if(!$slider)
                {
                    return $this->returnError('400', 'Sorry, This Slider did not updated');
                }   
                return $this->returnData('Slider',$slider,'200','Slider has been updated successfully');
        }
        catch (\Exception $ex)
        {
            return $ex;
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }   
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if(!$slider)
        $error = "Sorry, This Slider not found";
            return response()->json($error);            
        $slider->delete();
            return redirect()->route('admin.productSlider')->with(['success'=>'The Slider has been deleted successfully']);
    }
}
