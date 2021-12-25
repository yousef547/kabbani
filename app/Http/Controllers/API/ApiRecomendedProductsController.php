<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecomendedProductRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\RecomendedProducts;
use Illuminate\Http\Request;

class ApiRecomendedProductsController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $recommended_products = RecomendedProducts::get();
        
        foreach($recommended_products as $recommended_product) 
        
        {
            $integerIDs = array_map('intval', json_decode($recommended_product->recommended_products));
            
            $recommended_product['recommended_products'] = $integerIDs;
        }
        
        
       if(!$recommended_products)
        {
            return $this->returnError('400', 'Sorry, The Recommended Products did not found');
        }   
        return $this->returnData('Recommended Products',$recommended_products,'200','Recommended Products has been returned successfully');
    }

    public function store(RecomendedProductRequest $request)
    {
        // return $request;
        try
        {            
            $recommended_product = RecomendedProducts::create([
                'product_id'=>$request->product_id,
                'recommended_products'=>json_encode($request->recommended_products)
            ]);

            if(!$recommended_product)
            {
                return $this->returnError('400', 'Sorry, The Recommended Products did not found');
            }   
            return $this->returnData('Recommended Products' ,$recommended_product,'200','Recommended Products has been stored successfully');
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.recommended_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , RecomendedProductRequest $request) 
    {
        // Update data
        $recommended_product = RecomendedProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'recommended_products'=>json_encode($request->recommended_products)
        ]);

        if(!$recommended_product)
        {
            return $this->returnError('400', 'Sorry, The Recommended Products did not found');
        }   
        return $this->returnData('Recommended Products' ,$recommended_product,'200','Recommended Products has been updated successfully');
    }
    public function destroy($id)
    {
        $recommended_product = RecomendedProducts::findOrFail($id);
        $recommended_product->delete();

        if(!$recommended_product)
        {
            return $this->returnError('400', 'Sorry, The Recommended Products did not found');
        }   
        return $this->returnData('Recommended Products' ,$recommended_product,'200','Recommended Products has been deleted successfully');
    }

}