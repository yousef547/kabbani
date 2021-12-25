<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PopUp;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PopUpController extends Controller
{
    public function index() 
    {
        $popUps= PopUp::get();
        $products= Product::get();
        return view('admin.popUp.index',compact('popUps','products'));
    }

    public function create() 
    {
        $popUp= PopUp::get();
        $products= Product::get();
        return view('admin.popUp.create',compact('popUp','products'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {    
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('popups',$request->photo);
            }
            
            // return $request;
            PopUp::create([
                'product_id'=>$request->product_id,
                'text'=>$request->text,
                'text_ar'=>$request->text_ar,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.PopUp')->with(['success'=>'The Pop Up has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.PopUp')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $popUp= PopUp::findOrFail($id);
        $products= Product::get();

        if (! $popUp)
            {
                return redirect()->route('admin.popUp')->with(['error'=>'Sorry, This Pop Up not found']); 
            } 
            return view('admin.popUp.edit', compact('popUp','products'));    
    }

    public function update($id , Request $request) 
    {
        // return $request;
        $popUp = PopUp::findOrFail($id);
        if(!$popUp)
        return redirect()->route('admin.PopUp')->with(['error'=>'Sorry, This Pop Up not found']); 

        // Update data
        $popUp = PopUp::where('id',$id)->update([
            'product_id'=>$request->product_id,
            'text'=>$request->text,
            'text_ar'=>$request->text_ar,
        ]);
        if($request->hasFile('photo'))
        {
            $image = Str::after($popUp->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath=uploadImage('popups',$request->photo);
            // Save Photo
            PopUp::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.PopUp')->with(['success'=>'The Pop Up has been modified successfully']); 
    }

    public function destroy($id)
    {
        $popUp = PopUp::findOrFail($id);
        $popUp->delete();
        return redirect()->route('admin.PopUp')->with(['success'=>'The Pop Up has been deleted successfully']);
    }
}

