<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_LocationsRequest;
use App\Models\Customer_Locations;
use GuzzleHttp\Psr7\Request;

class Customer_LocationController extends Controller
{
    public function index()
    {
        $customers_locations = Customer_Locations::get();
        $customers = Customer::get();
        return view('admin.customers_locations.index',compact('customers_locations','customers'));
    }

    public function create()
    {
        $customers = Customer::get();
        return view('admin.customers_locations.create',compact('customers'));
    }

    public function store(Customer_LocationsRequest $request)
    {
        // Store in DB
        try
        {
            Customer_Locations::create([
            'customer_id'=>$request->customer_id,
            'email'=>$request->email,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            ]);
            return redirect()->route('admin.Customer_Locations')->with(['success'=>'The Location has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.Customer_Locations')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $customer_location = Customer_Locations::findOrFail($id);
        $customers = customer::get();

        if (!$customer_location)
            {
                return redirect()->route('admin.Customer_Locations')->with(['error'=>'Sorry, This Location not found']); 
            } 
            return view('admin.customers_locations.edit', compact('customers','customer_location'));    
    }

    public function update($id , Customer_LocationsRequest $request) 
    {

        $customer_Location = Customer_Locations::findOrFail($id);
        
        if(!$customer_Location)
        return redirect()->route('admin.Customer_Locations')->with(['error'=>'Sorry, This Location not found']); 
        
        // Update data
        $request = Customer_Locations::where('id',$id)->update([
            'customer_id'=>$request->customer_id,
            'email'=>$request->email,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);
        return redirect()->route('admin.Customer_Locations')->with(['success'=>'The Location has been modified successfully']); 
    }

    public function destroy($id)
    {
        $location = Customer_Locations::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.Customer_Locations')->with(['success'=>'The Location has been deleted successfully']);
    }

}
