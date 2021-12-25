<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\mainCategoryRequest;
use App\Models\MainCategory;
use App\Models\Seller;
use App\Http\Traits\GeneralTrait;

class ApiMainCategoryController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $mainCategories = MainCategory::get();

        if(!$mainCategories)
        {
            return $this->returnError('400', 'Sorry, The Main Categories did not found');
        }   
        return $this->returnData('Main Categories',$mainCategories,'200','Main Categories has been returned successfully');
    }

    public function count()
    {
        $mainCategories = MainCategory::get()->count();
        if(!$mainCategories)
        {
            return $this->returnError('400', 'There are not found any main categories');
        }   
        return $this->returnData('Main Categories',$mainCategories,'200','Main Categories Count returned successfully');
    }

    public function show($id)
    {
        $mainCategory = MainCategory::findOrFail($id);

        if(!$mainCategory)
        {
            return $this->returnError('400', 'Sorry, This Main Category not found');
        }   
        return $this->returnData('Main Category',$mainCategory,'200','Main Category returned successfully');

        return response()->json($mainCategory);
    }

    public function store(mainCategoryRequest $request)
    {
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('mainCategories',$request->photo);
            }
            $mainCategory = MainCategory::create([
                'name'=>$request->name,
                'name_ar'=>$request->name_ar,
                'photo'=>$filePath,
            ]);
            if(!$mainCategory)
            {
                return $this->returnError('400', 'Sorry, Cannot save this main category');
            }   
            return $this->returnData('Main Category',$mainCategory,'200','Main Category saved successfully');
        }
        catch (\Exception $ex)
        {
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }
    }

    public function update(mainCategoryRequest $request, $id)
    {
        try
        {
            $mainCategory = MainCategory::findOrFail($id);

            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('mainCategories',$request->photo);
            }
            
            if(!$mainCategory)
            return response()->json('Sorry, This Main Category not found'); 

            // Update data
            $mainCategory = MainCategory::where('id',$id)->update([
                'name'=>$request->name,
                'name_ar'=>$request->name_ar,
                'photo'=>$filePath,
            ]);

            if(!$mainCategory)
            {
                return $this->returnError('400', 'Sorry, This Main Category did not updated');
            }   
            return $this->returnData('Main Category',$mainCategory,'200','Main Category has been updated successfully');
        }
        catch (\Exception $ex)
        {
            $error = "Something went wrong. Please try again";
            return response()->json($error);
        }
    }

    public function destroy($id)
    {

        $mainCategory = MainCategory::findOrFail($id);
        if(!$mainCategory)
        return response()->json('Sorry, This Main Category not found');
        $sellers = Seller::get();
        foreach ($sellers as $seller)
        {    
            if($seller->main_category_id == $mainCategory->id )
            {
                return response()->json('Sorry, This Main Category cannot be deleted');
            }
        }
        $mainCategory->delete();
        return response()->json('The Main Category has been deleted successfully');
    }

}
