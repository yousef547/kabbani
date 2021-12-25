<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoCategoriesRequest;
use App\Models\Product;
use App\Models\PromoCategories;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PromoCategoriesController extends Controller
{
    public function index() 
    {
        $promoCategories = PromoCategories::get();
        $subCategories = SubCategory::get();
        $products= Product::get();
        return view('admin.promo_categories.index',compact('promoCategories','products','subCategories'));
    }

    public function create() 
    {
        $subCategories = SubCategory::get();
        $products = Product::get();
        return view('admin.promo_categories.create',compact('subCategories','products'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {    
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('PromoCategories',$request->photo);
            }
            PromoCategories::create([
                'title'=>$request->title,
                'title_ar'=>$request->title_ar,
                'photo'=>$filePath,
                'bannerLink'=>$request->bannerLink,
                'products'=>json_encode($request->products),
            ]);
            return redirect()->route('admin.promoCategories')->with(['success'=>'The Promo Category has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.promoCategories')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $promoCategory = PromoCategories::findOrFail($id);
        $sub_categories = SubCategory::get();
        $products = Product::get();

        if (! $promoCategory)
            {
                return redirect()->route('admin.promoCategories')->with(['error'=>'Sorry, This Promo Category not found']); 
            } 
            return view('admin.promo_categories.edit', compact('promoCategory','sub_categories','products'));    
    }

    public function update($id , Request $request) 
    {
        // return $request;
        $promoCategory = PromoCategories::findOrFail($id);
        if(!$promoCategory)
        return redirect()->route('admin.promoCategories')->with(['error'=>'Sorry, This Promo Category not found']); 

        // Update data
        $promoCategory = PromoCategories::where('id',$id)->update([
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
            'bannerLink'=>$request->bannerLink,
            'products'=>json_encode($request->products),
        ]);
        if($request->hasFile('photo'))
        {
            $image = Str::after($promoCategory->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath=uploadImage('PromoCategories',$request->photo);
            // Save Photo
            PromoCategories::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.promoCategories')->with(['success'=>'The Promo Category has been modified successfully']); 
    }

    public function destroy($id)
    {
        $promoCategory = PromoCategories::findOrFail($id);
        $promoCategory->delete();
        return redirect()->route('admin.promoCategories')->with(['success'=>'The Promo Category has been deleted successfully']);
    }
}
