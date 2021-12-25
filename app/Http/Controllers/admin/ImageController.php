<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesRequest;
use App\Models\Images;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Images::get();
        $products = Product::get();
        $sellers = Seller::get();
        return view('admin.productImages.index',compact('sellers','images','products'));
    }

    public function create()
    {
        $products= Product::get();
        $sellers = Seller::get();
        return view('admin.productImages.create',compact('products','sellers'));
    }

    public function store(ImagesRequest $request)
    {
    if ($request->hasfile('images')) {
        $images = $request->file('images');

        foreach($images as $image) {          
            $name = $image->getClientOriginalName();
            $path = $image->storeAs('uploads',$name);

            Images::create([
                'product_id' => $request->product_id,
                'image_name' => $name,
                'image_path' => '/kabbani/storage/app/'.$path
                ]);
            }
            return redirect()->route('admin.productImages')->with(['success'=>'The Product has been saved successfully']);
        }
    }
}
