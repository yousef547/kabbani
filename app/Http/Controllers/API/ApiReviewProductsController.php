<?php

namespace App\Http\Controllers\API;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewProductRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\ReviewProducts;
use Illuminate\Http\Request;

class ApiReviewProductsController extends Controller
{
    use GeneralTrait;
    public function index() 
    {
        $review_products = ReviewProducts::get();
        $customers = Customer::get();
        foreach ($review_products as $review_product) {
            foreach ($customers as $customer) {
            if($customer->id == $review_product->user_id)
                {
                    $review_product->user_name = $customer->name;
                }
            }
        }

        if(!$review_products)
        {
            return $this->returnError('400', 'Sorry, The Review Products did not found');
        }   
        return $this->returnData('Review Products',$review_products,'200','Review Products has been returned successfully');
    }

    public function store(ReviewProductRequest $request)
    {
        // return $request;
        try
        {            
            $review_product = ReviewProducts::create([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
                'review_num'=>$request->review_num,
                'review_comment'=>$request->review_comment,
            ]);
            if(!$review_product)
            {
                return $this->returnError('400', 'Sorry, The Review Product did not found');
            }   
            return $this->returnData('Review Product',$review_product,'200','Review Product has been stored successfully');
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.review_products')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , ReviewProductRequest $request) 
    {
        // Update data
        $review_product = ReviewProducts::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'related_products'=>json_encode($request->related_products)
        ]);
        if(!$review_product)
            {
                return $this->returnError('400', 'Sorry, The Review Product did not found');
            }   
            return $this->returnData('Review Product',$review_product,'200','Review Product has been updated successfully');
    }
    public function destroy($id)
    {
        $review_product = ReviewProducts::findOrFail($id);
        $review_product->delete();

        if(!$review_product)
            {
                return $this->returnError('400', 'Sorry, The Review Product did not found');
            }   
            return $this->returnData('Review Product',$review_product,'200','Review Product has been deleted successfully');
    }
}
