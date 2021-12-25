<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstallmentFormRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\InstallmentsForm;

class ApiInstallmentsFromController extends Controller
{ 
    use GeneralTrait;

    public function store(InstallmentFormRequest $request)
    {
        // return $request;
        $installmentForm = InstallmentsForm::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address'=>$request->address,
                'installment_type'=>$request->installment_type,
            ]);

            if(!$installmentForm)
            {
                return $this->returnError('400', 'Sorry, The installment form did not found');
            }   
            return $this->returnData('Installment Form',$installmentForm,'200','Installment form has been saved successfully');
    }

    public function update($id , InstallmentFormRequest $request) 
    {
        $installmentForm = InstallmentsForm::findOrFail($id);

        if(!$installmentForm)
        {
            return $this->returnError('400', 'Sorry, The installment form did not found');
        }  

        // Update data
        $installmentForm = InstallmentsForm::where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'installment_type'=>$request->installment_type,
        ]);
      
        return $this->returnData('Installment Form',$installmentForm,'200','Installment form has been updated successfully');

    }

    public function destroy($id)
    {

        $installmentsForm = InstallmentsForm::findOrFail($id);

        if(!$installmentsForm)
        {
            return $this->returnError('400', 'Sorry, The installment form did not found');
        }  

        $installmentsForm->delete();
        return $this->returnData('Installment Form',$installmentsForm,'200','Installment form has been deleted successfully');
    }
}
