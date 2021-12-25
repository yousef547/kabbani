<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function create($id)
    {
        $customers = Customer::get();
        $product = Product::findOrFail($id);
        return view('front.rates.create',compact('customers','product'));
    }

    public function store(RateRequest $request)
    {
        try 
        {
            $rate = Rate::create([
                'product_id'=>$request->product_id,
                'email'=>$request->email,
                'rate'=>$request->rate,
                'message'=>$request->message
            ]);
            return redirect()->route('admin.products')->with(['success'=>'The Rate has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.products')->with(['error'=>'Something went wrong. Please try again']);
        }    
    }
}
