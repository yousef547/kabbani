<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use App\Models\Product;
use App\Models\Seller;
use App\Http\Traits\GeneralTrait;

class ApisellerController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $sellers = Seller::get();

        if(!$sellers)
        {
            return $this->returnError('400', 'Sorry, The Sellers did not found');
        }   
        return $this->returnData('Sellers',$sellers,'200','Sellers has been returned successfully');
    }

    public function count()
    {
        $sellers = Seller::get()->count();
    
        if(!$sellers)
        {
            return $this->returnError('400', 'Sorry, The Sellers count did not found');
        }   
        return $this->returnData('Sellers Count',$sellers,'200','Sellers count has been returned successfully');
    }

    public function show($id)
    {
        $seller = Seller::findOrFail($id);
        
        if(!$seller)
        {
            return $this->returnError('400', 'Sorry, This Seller did not found');
        }   
        return $this->returnData('Seller',$seller,'200','Seller has been returned successfully');
    }

    public function store(SellerRequest $request)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('sellers',$request->photo);
            }
            $seller = Seller::create([
                'seller_name'=>$request->seller_name,
                'seller_ar'=>$request->seller_ar,
                'store_name'=>$request->store_name,
                'store_ar'=>$request->store_ar,
                'main_category_id'=>$request->main_category_id,
                'email'=>$request->email,
                'active'=>$request->active,
                'password'=>$request->password,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'photo'=>$filePath,
            ]);

            if(!$seller)
                {
                    return $this->returnError('400', 'Sorry, This Seller did not stored');
                }   
                return $this->returnData('Seller',$seller,'200','Seller has been stored successfully');        
    }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function update(SellerRequest $request, $id)
    {
        try
        {
            $seller = Seller::findOrFail($id);
            
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('sellers',$request->photo);
            }
            // Update data
            $seller = Seller::where('id',$id)->update([
                'seller_name'=>$request->seller_name,
                'store_name'=>$request->store_name,
                'main_category_id'=>$request->main_category_id,
                'email'=>$request->email,
                'active'=>$request->active,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'photo'=>$filePath,
                ]);

            if(!$seller)
                {
                    return $this->returnError('400', 'Sorry, This Seller did not updated');
                }   
                return $this->returnData('Seller',$seller,'200','Seller has been updated successfully');        
        }
        catch (\Exception $ex)
        {
            return response()->json("Something went wrong. Please try again");
        }
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        if(!$seller)
            return response()->json('Sorry, This seller not found');
        $products = Product::get();
            foreach($products as $product)
            if($product->seller_id == $seller->id)
                return response()->json('Sorry, This seller Could not delete');
        $seller->delete();
            return response()->json('The seller has been deleted successfully');
    }
}

