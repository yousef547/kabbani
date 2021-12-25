<?php

namespace App\Http\Controllers\API;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RateRequest;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiRateController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $rate = Rate::get();    

        if(!$rate)
        {
            return $this->returnError('400', 'Sorry, The Rates did not found');
        }   
        return $this->returnData('Rates',$rate,'200','Rates has been returned successfully');
    }

    public function review(Request $request)
    {
        $rate = Rate::where('email',$request->email)->get();    

        if(!$rate)
            {
                return $this->returnError('400', 'Sorry, The Rate did not found');
            }   
            return $this->returnData('Rate',$rate,'200','Rate has been returned successfully');
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

                if(!$rate)
                {
                    return $this->returnError('400', 'Sorry, The Rate did not save');
                }   
                return $this->returnData('Rate',$rate,'200','The Rate has been saved successfully');
            }
        catch (\Exception $ex)
            {
                return response()->json("Something went wrong. Please try again");
            }
    }
}
