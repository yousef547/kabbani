<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NewArrival;
use App\Models\Product;
use Illuminate\Http\Request;

class NewArrivalController extends Controller
{
    public function index() 
    {
        $newArrivals = NewArrival::get();
        $products = Product::get();

        return view('admin.newArrival.index',compact('newArrivals','products'));
    }

    public function create()
    {
        $products = Product::get();
        return view('admin.newArrival.create',compact('products'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {            
            NewArrival::create([
                'title'=>$request->title,
                'title_ar'=>$request->title_ar,
                'items'=>json_encode($request->items)
            ]);
            return redirect()->route('admin.newArrivals')->with(['success'=>'The New Arrival has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.newArrivals')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $newArrival = NewArrival::findOrFail($id);
        $products = Product::get();

        if (! $newArrival)
            {
                return redirect()->route('admin.newArrivals')->with(['error'=>'Sorry, This New Arrival not found']); 
            } 
            return view('admin.newArrival.edit', compact('newArrival','products'));    
    }

    public function update($id , Request $request) 
    {

        $newArrival = NewArrival::findOrFail($id);
        if(!$newArrival)
        return redirect()->route('admin.newArrivals')->with(['error'=>'Sorry, This New Arrival not found']); 

        // Update data
        $request = NewArrival::where('id',$id)->update([
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
            'items'=>json_encode($request->items)
        ]);
        return redirect()->route('admin.newArrivals')->with(['success'=>'The New Arrival has been modified successfully']); 
    }

    public function destroy($id)
    {
        $newArrival = NewArrival::findOrFail($id);
        $newArrival->delete();
        return redirect()->route('admin.newArrivals')->with(['success'=>'The New Arrival has been deleted successfully']);
    }
}
