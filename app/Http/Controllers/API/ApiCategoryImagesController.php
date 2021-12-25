<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryImagesRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Category;
use App\Models\CategoryImages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiCategoryImagesController extends Controller
{
    use GeneralTrait;
    public function index() 
    {
        $categoryImages = CategoryImages::get();
        if(!$categoryImages)
        {
            return $this->returnError('400', 'Sorry, The Category Slider did not found');
        }   
        return $this->returnData('Category Slider',$categoryImages,'200','Category Slider has been returned successfully');
    }

    public function store(CategoryImagesRequest $request)
    {  
        $filePath = "";
        if($request->has('photo'))
        {
            $filePath=uploadImage('categoryImages',$request->photo);
        }
        $categoryImage = CategoryImages::create([
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'image_name'=>$request->image_name,
            'photo'=>$filePath,
        ]);
        if(!$categoryImage)
        {
            return $this->returnError('400', 'Sorry, The Category Slider did not found');
        }   
        return $this->returnData('Category Slider',$categoryImage,'200','Category Slider has been saved successfully');
    }

    public function update($id , CategoryImagesRequest $request)
    {
        $filePath = "";
        if($request->has('photo'))
        {
            $filePath=uploadImage('categoryImages',$request->photo);
        }
        $categoryImage = CategoryImages::create([
           'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'image_name'=>$request->image_name,
            'photo'=>$filePath,
        ]);
        if(!$categoryImage)
        {
            return $this->returnError('400', 'Sorry, The Category Slider did not found');
        }   
        return $this->returnData('Category Slider',$categoryImage,'200','Category Slider has been updated successfully');
    }

    public function destroy($id)
    {
        $categoryImage = CategoryImages::findOrFail($id);
            if(!$categoryImage)
            {
                return $this->returnError('400', 'Sorry, The Category Slider did not found');
            }   
        $categoryImage->delete();
        return redirect()->route('admin.categorySlider')->with(['success'=>'The Slider has been deleted successfully']);
    }
}
