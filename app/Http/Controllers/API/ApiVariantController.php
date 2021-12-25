<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use App\Http\Requests\VariantRequest;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiVariantController extends Controller
{
    use GeneralTrait;

    public function index($id)
    {
        $variants = Variant::where('product_id', $id)->get();
        
        if(!$variants)
        {
            return $this->returnError('400', 'Sorry, Variants did not found');
        }   
        return $this->returnData('Variants',$variants,'200','Variants has been returned successfully');
    }

    public function store(VariantRequest $request)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('variants',$request->photo);
            }
            $variant =  Variant::create([
                'product_id'=>$request->product_id,
                'variant_type'=>$request->variant_type,
                'variant'=>$request->variant,
                'photo'=>$filePath,
            ]);
            if(!$variant)
            {
                return $this->returnError('400', 'Sorry, Cannot save this variant');
            }   
            return $this->returnData('Main Category',$variant,'200','Variant saved successfully');
        }
        catch (\Exception $ex)
        {
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }
    }

    public function update(VariantRequest $request, $id)
    {
        try
        {
            $variant = Variant::findOrFail($id);

            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('variants',$request->photo);
            }
            
            if(!$variant)
            return response()->json('Sorry, This Variant not found'); 

            // Update data
            $variant = Variant::where('id',$id)->update([
                'product_id'=>$request->product_id,
                'variant_type'=>$request->variant_type,
                'variant'=>$request->variant,
                'photo'=>$filePath,
            ]);

            if(!$variant)
            {
                return $this->returnError('400', 'Sorry, This Variant did not updated');
            }   
            return $this->returnData('Variant',$variant,'200','Variant has been updated successfully');
        }
        catch (\Exception $ex)
        {
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }
    }

    public function destroy($id)
    {

        $variant = Variant::findOrFail($id);
        if(!$variant)
        return response()->json('Sorry, This Main Category not found');
       
        $variant->delete();
        return response()->json('The Variant has been deleted successfully');
    }

}
