<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Seller;


class LocationController extends Controller
{
    public function index()
    {
        $sellers = Seller::get();
        $locations = Location::get();
        return view('admin.location.index',compact('sellers','locations'));
    }

    public function create()
    {
        $sellers = Seller::get();
        return view('admin.location.create',compact('sellers'));
    }

    public function store(LocationRequest $request)
    {
        // Store in DB
        try
        {
            Location::create([
            'seller_id'=>$request->seller_id,
            'location'=>$request->location,
            'location_ar'=>$request->location_ar,
            'theAddress'=>$request->theAddress,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'distance'=>$request->distance,
            ]);
            return redirect()->route('admin.locations')->with(['success'=>'The Location has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.locations')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        $sellers = Seller::get();

        if (! $location)
            {
                return redirect()->route('admin.locations')->with(['error'=>'Sorry, This Location not found']); 
            } 
            return view('admin.location.edit', compact('location','sellers'));    
    }

    public function update($id , LocationRequest $request) 
    {

        $location = location::findOrFail($id);
        
        if(!$location)
        return redirect()->route('admin.locations')->with(['error'=>'Sorry, This Location not found']); 
        
        // Update data
        $request = Location::where('id',$id)->update([
            'seller_id'=>$request->seller_id,
            'location'=>$request->location,
            'location_ar'=>$request->location_ar,
            'theAddress'=>$request->theAddress,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'distance'=>$request->distance,
            ]);
        return redirect()->route('admin.locations')->with(['success'=>'The Location has been modified successfully']); 
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.locations')->with(['success'=>'The Location has been deleted successfully']);
    }

}
