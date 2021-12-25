<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelatedProductsRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\RelatedProducts;
use Illuminate\Http\Request;

class ApiRelatedProductsController extends Controller
{
    use GeneralTrait;

    public function index() 
    {    
        $related_products = RelatedProducts::get();
        
        foreach ($related_products as $related_product) 
        {
             $integerIDs = array_map('intval', json_decode($related_product->related_products));
        
                $related_product['related_products'] = $integerIDs;
        }
        
       
        
        if(!$related_products)
        {
            return $this->returnError('400', 'Sorry, The Related Products did not found');
        }   
        return $this->returnData('Related Products',$related_products,'200','Related Products has been returned successfully');
    }
    public function store(RelatedProductsRequest $request)
    {
        // return $request;
        try
        {            
            $related_product = RelatedProducts::create([
                'product_id'=>$request->product_id,
                'related_products'=>json_encode($request->related_products)
            ]);

        if(!$related_product)
        {
            return $this->returnError('400', 'Sorry, The Related Product did not found');
        }   
        return $this->returnData('Related Product',$related_product,'200','Related Product has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.related_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , RelatedProductsRequest $request) 
    {
        // Update data
        $related_product = RelatedProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'related_products'=>json_encode($request->related_products)
        ]);
        
        if(!$related_product)
        {
            return $this->returnError('400', 'Sorry, The Related Product did not found');
        }   
        return $this->returnData('Related Product',$related_product,'200','Related Product has been updated successfully');
    }

    public function destroy($id)
    {
        $related_product = RelatedProducts::findOrFail($id);
        $related_product->delete();

        if(!$related_product)
        {
            return $this->returnError('400', 'Sorry, The Related Product did not found');
        }   
        return $this->returnData('Related Product',$related_product,'200','Related Product has been deleted successfully');
    }
}

