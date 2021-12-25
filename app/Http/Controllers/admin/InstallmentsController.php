<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallmentRequest;
use App\Models\Installments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstallmentsController extends Controller
{ 
    public function index()
    {
        $installments = Installments::get();
        return view('admin.installments.index',compact('installments'));
    }

    public function create()
    {
        return view('admin.installments.create');
    }

    public function store(InstallmentRequest $request)
    {
        // return $request;
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('installments',$request->photo);
            }
            Installments::create([
                'installment_name'=>$request->installment_name,
                'installment_name_ar'=>$request->installment_name_ar,
                'installment_type'=>$request->installment_type,
                'installment_type_ar'=>$request->installment_type_ar,
                'description'=>$request->description,
                'description_ar'=>$request->description_ar,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.installments')->with(['success'=>'The Installment has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.installments')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $installment = Installments::findOrFail($id);

        if (! $installment)
            {
                return redirect()->route('admin.installments')->with(['error'=>'Sorry, This Category not found']); 
            } 
            return view('admin.installments.edit', compact('installment'));    
    }

    public function update($id , InstallmentRequest $request) 
    {
        $installment = Installments::findOrFail($id);
        
        if(!$installment)
        return redirect()->route('admin.installments')->with(['error'=>'Sorry, This Category not found']); 

        // Update data
        Installments::where('id',$id)->update([
            'installment_name'=>$request->installment_name,
            'installment_name_ar'=>$request->installment_name_ar,
            'installment_type'=>$request->installment_type,
            'installment_type_ar'=>$request->installment_type_ar,
            'description'=>$request->description,
            'description_ar'=>$request->description_ar,           
        ]);

        if($request->hasFile('photo'))
        {
            $image = Str::after($installment->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath=uploadImage('installments',$request->photo);
            // Save Photo
            Installments::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.installments')->with(['success'=>'The Installment has been modified successfully']); 

    }

    public function destroy($id)
    {

        $installment = Installments::findOrFail($id);
        if(!$installment)
            return redirect()->route('admin.installments')->with(['error'=>'Sorry, This Installment not found']);

        $installment->delete();
        return redirect()->route('admin.installments')->with(['success'=>'The Installment has been deleted successfully']);
    }
}
