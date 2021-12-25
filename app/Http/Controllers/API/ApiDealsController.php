<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DealsRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Deals;
use Illuminate\Support\Str;


class ApiDealsController extends Controller
{ 
    use GeneralTrait;
    public function index()
    {
        $deals = Deals::get();
      
        if(!$deals)
        {
            return $this->returnError('400', 'Sorry, The Deals did not found');
        }   
        return $this->returnData('Deals',$deals,'200','Deals has been returned successfully');
    }
    public function store(DealsRequest $request)
    {
        // return $request;
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
        $deal = Deals::create([
                'dealName'=>$request->dealName,
                'dealName_ar'=>$request->dealName_ar,
                'dealType'=>$request->dealType,
                'category_id'=>$request->category_id,
                'product_id'=>$request->product_id,
                'photo1'=>$filePath1,
                'photo2'=>$filePath2,
            ]);
            if(!$deal)
            {
                return $this->returnError('400', 'Sorry, The Deal did not found');
            } 
        return $this->returnData('Deal',$deal,'200','Deals has been stored successfully');
}

    public function update($id , DealsRequest $request) 
    {
        $deal = Deals::findOrFail($id);
        
        if(!$deal)
        {
            return $this->returnError('400', 'Sorry, The Deal did not found'); 
        }

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
        return $this->returnData('Deal',$deal,'200','Deals has been updated successfully');
    }

    public function destroy($id)
    {

        $deal = Deals::findOrFail($id);
        if(!$deal)
            return redirect()->route('admin.dealsBanners')->with(['error'=>'Sorry, This Deal not found']);
        $deal->delete();
        return $this->returnData('Deal',$deal,'200','Deals has been removed successfully');
    }
}

