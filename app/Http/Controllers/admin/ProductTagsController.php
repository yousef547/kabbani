<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTagsRequest;
use App\Models\ProductTags;
use Illuminate\Http\Request;

class ProductTagsController extends Controller
{
    public function index() 
    {
        $productTags = ProductTags::get();
        return view('admin.product_tags.index',compact('productTags'));
    }

    public function create() 
    {
        return view('admin.product_tags.create');
    }

    public function store(ProductTagsRequest $request)
    {
        // return $request;
        try
        {            
            ProductTags::create([
                'tag'=>$request->tag,
                'tag_ar'=>$request->tag_ar,
                'color'=>$request->color
            ]);
            return redirect()->route('admin.productTags')->with(['success'=>'The Product tag has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.productTags')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $productTag = ProductTags::findOrFail($id);

        if (! $productTag)
            {
                return redirect()->route('admin.productTags')->with(['error'=>'Sorry, This Product tag not found']); 
            } 
            return view('admin.product_tags.edit', compact('productTag'));    
    }

    public function update($id , ProductTagsRequest $request) 
    {
        // return $request;
        $productTag = ProductTags::findOrFail($id);
        if(!$productTag)
        return redirect()->route('admin.productTags')->with(['error'=>'Sorry, This Product tag not found']); 

        // Update data
        $productTag = ProductTags::where('id',$id)->update([
            'tag'=>$request->tag,
            'tag_ar'=>$request->tag_ar,
            'color'=>$request->color
        ]);
        return redirect()->route('admin.productTags')->with(['success'=>'The Product tag has been modified successfully']); 
    }

    public function destroy($id)
    {
        $productTag = ProductTags::findOrFail($id);
        $productTag->delete();
        return redirect()->route('admin.productTags')->with(['success'=>'The Product tag has been deleted successfully']);
    }
    
     public function changeStatus($id)
    {
        $productTag = ProductTags::findOrFail($id);
        if(!$productTag)
        return redirect()->route('admin.productTags')->with(['error'=>'Sorry, This Product not found']); 
    
        // Change Status
        $status = $productTag->active == 0 ? 1 : 0 ;
        $productTag -> update(['active' => $status]);
        return redirect()->route('admin.productTags')->with(['success'=>'The Status has been Changed successfully']);

    }
}
