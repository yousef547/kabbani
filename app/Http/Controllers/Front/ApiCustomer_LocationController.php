<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_LocationsRequest;
use App\Models\Customer_Locations;
use App\Http\Traits\GeneralTrait;
use GuzzleHttp\Psr7\Request;

class ApiCustomer_LocationController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $customers_locations = Customer_Locations::get();
        if(!$customers_locations)
        {
            return $this->returnError('400', 'Sorry, This Customers Locations did not found');
        }   
        return $this->returnData('Customers Locations',$customers_locations,'200','New customer has been returned successfully');
    }

    public function count()
    {
        $customers_locations = Customer_Locations::count();
        
        if(!$customers_locations)
        {
            return $this->returnError('400', 'Sorry, This Customers Locations Count did not found');
        }   
        return $this->returnData('Customers Locations Count',$customers_locations,'200','Customers locations count has been returned successfully');
    }

    public function show(Customer_LocationsRequest $request)
    {
        $customer_locations = Customer_Locations::where('email',$request->email)->get();
        
        if(!$customer_locations)
        {
            return $this->returnError('400', 'Sorry, This Customer Locations did not found');
        }   
        return $this->returnData('Customer Locations',$customer_locations,'200','Customer locations has been returned successfully');
    }

    public function store(Customer_LocationsRequest $request)
    {
        // Store in DB
        try
        {
            $customer_location = Customer_Locations::create([
            'customer_id'=>$request->customer_id,
            'email'=>$request->email,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            ]);
            return $this->returnData('Customer Location',$customer_location,'200','Customer location has been saved successfully');
        }

        catch (\Exception $ex)
        {
            return redirect()->route('admin.Customer_Locations')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , Customer_LocationsRequest $request) 
    {

        $customer_Location = Customer_Locations::findOrFail($id);
        
        // Update data
        $customer_Location = Customer_Locations::where('id',$id)->update([
            'customer_id'=>$request->customer_id,
            'email'=>$request->email,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);

        if(!$customer_Location)
        {
            return $this->returnError('400', 'Sorry, This Customer Location did not found');
        }   

        return $this->returnData('Customer Location',$customer_Location,'200','Customer locations has been updated successfully');
    }

    public function destroy($id)
    {
        $customer_Location = Customer_Locations::findOrFail($id);
        $customer_Location->delete();
     
        if(!$customer_Location)
        {
            return $this->returnError('400', 'Sorry, This Customer Location did not found');
        }   

        return $this->returnData('Customer Location',$customer_Location,'200','Customer locations has been deleted successfully');
    }

}
