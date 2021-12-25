<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WheelRequest;
use App\Models\Wheel;

class WheelController extends Controller
{
    public function index() 
    {
        $wheel_gifts = Wheel::get();
        return view('admin.wheel.index',compact('wheel_gifts'));
    }

    public function create()
    {
        $wheel_gifts = Wheel::get();
        return view('admin.wheel.create',compact('wheel_gifts'));
    }

    public function store(WheelRequest $request)
    {
        // return $request;
        try
        {            
            Wheel::create([
                'value'=>$request->value,
            ]);
            return redirect()->route('admin.wheel')->with(['success'=>'The Wheel Gift has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.wheel')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $Wheel_gift = Wheel::findOrFail($id);

        if (! $Wheel_gift)
            {
                return redirect()->route('admin.wheel')->with(['error'=>'Sorry, This Wheel Gift not found']); 
            } 
            return view('admin.wheel.edit', compact('Wheel_gift'));    
    }

    public function update($id , WheelRequest $request) 
    {

        $Wheel = Wheel::findOrFail($id);
        if(!$Wheel)
        return redirect()->route('admin.wheel')->with(['error'=>'Sorry, This Wheel Gift not found']); 

        // Update data
        $request = Wheel::where('id',$id)->update([
            'value'=>$request->value,
        ]);
        return redirect()->route('admin.wheel')->with(['success'=>'The Wheel Gift has been modified successfully']); 
    }

    public function destroy($id)
    {
        $Wheel = Wheel::findOrFail($id);
        $Wheel->delete();
        return redirect()->route('admin.wheel')->with(['success'=>'The Wheel Gift has been deleted successfully']);
    }

    public function changeStatus($id)
    {
        $wheel = Wheel::findOrFail($id);
        if(!$wheel)
        return redirect()->route('admin.wheel')->with(['error'=>'Sorry, This Wheel not found']); 
    
        // Change Status
        $status = $wheel->active == 0 ? 1 : 0 ;
        $wheel -> update(['active' => $status]);
        return redirect()->route('admin.wheel')->with(['success'=>'The Status has been Changed successfully']);

    }
}