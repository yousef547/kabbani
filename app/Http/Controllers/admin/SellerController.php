<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Http\Requests\SellerRequest;
use App\Models\Product;
use App\Models\Seller;
use App\Notifications\SellerCreated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function index() 
    {
        $sellers = Seller::paginate(PAGINATION_COUNT);
        $categories = MainCategory::paginate(PAGINATION_COUNT);
        return view('admin.seller.index',compact('sellers','categories'));
    }

    public function create()
    {
        $categories = MainCategory::get();
        return view('admin.seller.create',compact('categories'));
    }

    public function store(SellerRequest $request)
    {
        // return $request;
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

            // Send Notification to Seller
                Notification::send($seller, new SellerCreated($seller));

            // return $request;
            return redirect()->route('admin.sellers')->with(['success'=>'The Seller has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.sellers')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        if (! $seller)
            {
                return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This Seller not found']); 
            } 
        $mainCategories = MainCategory::get();
            return view('admin.seller.edit',compact('seller','mainCategories'));
    }

    public function update($id , SellerRequest $request)
    {
        $seller = Seller::findOrFail($id);
        if(!$seller)
        return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This Seller not found']); 
    
        // Update data
        Seller::where('id',$id)->update([
                'seller_name'=>$request->seller_name,
                'seller_ar'=>$request->seller_ar,
                'store_name'=>$request->store_name,
                'store_ar'=>$request->store_ar,
                'main_category_id'=>$request->main_category_id,
                'email'=>$request->email,
                'active'=>$request->active,
                'password'=>Hash::make($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]); 
            // dd($request);

        $filePath = $seller->photo;
        if($request->hasFile('photo'))
        {
        // Image
            $image = Str::after($seller->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
            $filePath=uploadImage('sellers',$request->photo);
            Seller::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }

        if($request->has('password'))
        {
        // password
            Seller::where('id',$id)->update([
            'password'=>$request->password,
            ]);
        }

        return redirect()->route('admin.sellers')->with(['success'=>'The Seller has been modified successfully']); 
    }

    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        if(!$seller)
            return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This Seller not found']);
        $products = Product::get();
        if(isset($products) && $products->count() > 0 )
        {
            return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This Seller cannot be deleted']);
        }
        $image = Str::after($seller->photo, 'assets/'); 
        $image = base_path('assets/'.$image);
        unlink($image);
        $seller->delete();
            return redirect()->route('admin.sellers')->with(['success'=>'The Seller has been deleted successfully']);
    }

    public function changeStatus($id)
    {
        $seller = Seller::findOrFail($id);
        if(!$seller)
        return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This Seller not found']); 
    
        // Change Status
        $status = $seller->active == 0 ? 1 : 0 ;
        $seller -> update(['active' => $status]);
        return redirect()->route('admin.sellers')->with(['success'=>'The Status has been Changed successfully']);

    }
}
