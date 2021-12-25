<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesRequest;
use App\Models\Images;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;

class ApiImagesController extends Controller
{
    use GeneralTrait;
 
    public function index($id)
    {
        $images = Images::where('product_id' , $id)->get();
        
        if(!$images)
        {
            return $this->returnError('400', 'There are not found any images');
        }   
        return $this->returnData('Images',$images,'200','Images returned successfully');
    }

    public function show(Request $request)
    {
        $images = Images::where('product_id',$request->product_id)->get();
        
        if(!$images)
        {
            return $this->returnError('400', 'There are not found any images');
        }   
        return $this->returnData('Images',$images,'200','Images returned successfully');
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
                'image_path' => '/storage/app/'.$path
                ]);
            }
            return $this->returnData('Images',$images,'200','Images saved successfully');
        }
    }
}
