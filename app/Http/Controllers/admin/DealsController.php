<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealsRequest;
use App\Models\Category;
use App\Models\Deals;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DealsController extends Controller
{ 
    public function index()
    {
        $deals = Deals::get();
        $categories = Category::get();
        $products = Product::get();
        return view('admin.deals.index',compact('deals','categories','products'));
    }

    public function create()
    {
        $categories = Category::get();
        $products = Product::get();

        return view('admin.deals.create',compact('categories','products'));
    }

    public function store(DealsRequest $request)
    {
        // return $request;
        try
        {
            $filePath1 = "";
            if($request->has('photo1'))
            {
                $filePath1=uploadImage('deals',$request->photo1);
            }
            $filePath2 = "";
            if($request->has('photo2'))
            {
                $filePath2=uploadImage('deals',$request->photo2);
            }
        Deals::create([
                'dealName'=>$request->dealName,
                'dealName_ar'=>$request->dealName_ar,
                'dealType'=>$request->dealType,
                'category_id'=>$request->category_id,
                'product_id'=>$request->product_id,
                'photo1'=>$filePath1,
                'photo2'=>$filePath2,
            ]);
            return redirect()->route('admin.dealsBanners')->with(['success'=>'The Deals has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.dealsBanners')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $categories = Category::get();
        $products = Product::get();
        $deal = Deals::findOrFail($id);

        if (! $deal)
            {
                return redirect()->route('admin.dealsBanners')->with(['error'=>'Sorry, This deal not found']); 
            } 
            return view('admin.deals.edit', compact('deal','categories','products'));    
    }

    public function update($id , DealsRequest $request) 
    {
        $deal = Deals::findOrFail($id);
        
        if(!$deal)
        return redirect()->route('admin.dealsBanners')->with(['error'=>'Sorry, This Deal not found']); 

        // Update data
        Deals::where('id',$id)->update([
            'dealName'=>$request->dealName,
            'dealName_ar'=>$request->dealName_ar,
            'dealType'=>$request->dealType,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
        ]);

        if($request->hasFile('photo1'))
        {
            $image = Str::after($deal->photo1, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath1=uploadImage('deals',$request->photo1);
            // Save Photo
            Deals::where('id',$id)->update([
                'photo1'=>$filePath1,
            ]);
        }
        if($request->hasFile('photo2'))
        {
            $image = Str::after($deal->photo2, 'assets/');
            $image = base_path('assets/'.$image);
            $filePath2=uploadImage('deals',$request->photo2);
            // Save Photo
            Deals::where('id',$id)->update([
                'photo2'=>$filePath2,
            ]);
        }
        return redirect()->route('admin.dealsBanners')->with(['success'=>'The Deal has been modified successfully']); 

    }

    public function destroy($id)
    {

        $deal = Deals::findOrFail($id);
        if(!$deal)
            return redirect()->route('admin.dealsBanners')->with(['error'=>'Sorry, This Deal not found']);
        $deal->delete();
        return redirect()->route('admin.dealsBanners')->with(['success'=>'The Deal has been deleted successfully']);
    }
}

