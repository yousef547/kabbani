<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TopSelling;
use Illuminate\Http\Request;

class TopSellingController extends Controller
{
    public function index() 
    {
        $topSellings = TopSelling::get();
        $products = Product::get();

        return view('admin.topSelling.index',compact('topSellings','products'));
    }

    public function create()
    {
        $products = Product::get();
        return view('admin.topSelling.create',compact('products'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {            
            TopSelling::create([
                'title'=>$request->title,
                'title_ar'=>$request->title_ar,
                'items'=>json_encode($request->items)
            ]);
            return redirect()->route('admin.topSellings')->with(['success'=>'The Top Seelling has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.topSellings')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $topSelling = TopSelling::findOrFail($id);
        $products = Product::get();

        if (! $topSelling)
            {
                return redirect()->route('admin.topSellings')->with(['error'=>'Sorry, This Top Seelling not found']); 
            } 
            return view('admin.topSelling.edit', compact('topSelling','products'));    
    }

    public function update($id , Request $request) 
    {

        $topSelling = TopSelling::findOrFail($id);
        if(!$topSelling)
        return redirect()->route('admin.topSellings')->with(['error'=>'Sorry, This Top Seelling not found']); 

        // Update data
        $request = TopSelling::where('id',$id)->update([
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
            'items'=>json_encode($request->items)
        ]);
        return redirect()->route('admin.topSellings')->with(['success'=>'The Top Seelling has been modified successfully']); 
    }

    public function destroy($id)
    {
        $topSelling = TopSelling::findOrFail($id);
        $topSelling->delete();
        return redirect()->route('admin.topSellings')->with(['success'=>'The Top Seelling has been deleted successfully']);
    }
}
