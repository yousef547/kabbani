<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallmentFormRequest;
use App\Models\InstallmentsForm;
use Illuminate\Http\Request;

class InstallmentsFormController extends Controller
{ 
    public function index()
    {
        $installmentsForms = InstallmentsForm::get();
        return view('admin.installmentForm.index',compact('installmentsForms'));
    }

    public function create()
    {
        return view('admin.installmentForm.create');
    }

    public function store(InstallmentFormRequest $request)
    {
        // return $request;
        try
        {
            InstallmentsForm::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address'=>$request->address,
                'installment_type'=>$request->installment_type,
            ]);
            return redirect()->route('admin.installmentForm')->with(['success'=>'The Installment Form has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.installmentForm')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $installmentsForm = InstallmentsForm::findOrFail($id);

        if (! $installmentsForm)
            {
                return redirect()->route('admin.installmentForm')->with(['error'=>'Sorry, This Installment Form not found']); 
            } 
            return view('admin.installmentForm.edit', compact('installmentsForm'));    
    }

    public function update($id , InstallmentFormRequest $request) 
    {
        $installmentsForm = InstallmentsForm::findOrFail($id);
        
        if(!$installmentsForm)
        return redirect()->route('admin.installmentForm')->with(['error'=>'Sorry, This Installment Form not found']); 

        // Update data
        InstallmentsForm::where('id',$id)->update([
            'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address'=>$request->address,
                'installment_type'=>$request->installment_type,
        ]);
      
        return redirect()->route('admin.installmentForm')->with(['success'=>'The Installment Form has been modified successfully']); 

    }

    public function destroy($id)
    {

        $installmentsForm = InstallmentsForm::findOrFail($id);
        if(!$installmentsForm)
            return redirect()->route('admin.installmentForm')->with(['error'=>'Sorry, This Installment not found']);

        $installmentsForm->delete();
        return redirect()->route('admin.installmentForm')->with(['success'=>'The Installment Form has been deleted successfully']);
    }
}
