<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Http\Requests\mainCategoryRequest;
use App\Models\Seller;
use Illuminate\Support\Str;

class MainCategoryController extends Controller
{ 
    public function index()
    {
        $mainCategories = MainCategory::get();
        return view('admin.mainCategory.index',compact('mainCategories'));
    }

    public function create()
    {
        return view('admin.mainCategory.create');
    }

    public function store(mainCategoryRequest $request)
    {
        // return $request;
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('mainCategories',$request->photo);
            }
            MainCategory::create([
                'name'=>$request->name,
                'name_ar'=>$request->name_ar,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.mainCategories')->with(['success'=>'The Main Category has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.mainCategories')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $mainCategory = MainCategory::findOrFail($id);

        if (! $mainCategory)
            {
                return redirect()->route('admin.mainCategories')->with(['error'=>'Sorry, This Category not found']); 
            } 
            return view('admin.mainCategory.edit', compact('mainCategory'));    
    }

    public function update($id , mainCategoryRequest $request) 
    {
        $mainCategory = MainCategory::findOrFail($id);
        
        if(!$mainCategory)
        return redirect()->route('admin.mainCategories')->with(['error'=>'Sorry, This Category not found']); 

        // Update data
        MainCategory::where('id',$id)->update([
            'name'=>$request->name,
            'name_ar'=>$request->name_ar,
        ]);

        if($request->hasFile('photo'))
        {
            $image = Str::after($mainCategory->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath=uploadImage('mainCategories',$request->photo);
            // Save Photo
            MainCategory::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.mainCategories')->with(['success'=>'The Main Category has been modified successfully']); 

    }

    public function destroy($id)
    {

        $mainCategory = MainCategory::findOrFail($id);
        if(!$mainCategory)
            return redirect()->route('admin.mainCategories')->with(['error'=>'Sorry, This Main Category not found']);

        $sellers = Seller::get();
            foreach ($sellers as $seller)
        {    
            if($seller->main_category_id == $mainCategory->id )
            {
                return redirect()->route('admin.mainCategories')->with(['error'=>'Sorry, This Main Category cannot be deleted']);
            }
        }
        $mainCategory->delete();
        return redirect()->route('admin.mainCategories')->with(['success'=>'The Main Category has been deleted successfully']);
    }
}

