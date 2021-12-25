<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Installments;

class ApiInstallmentsController extends Controller
{
    use GeneralTrait;
    
    public function index()
    {
        $installments = Installments::get();

        if(!$installments)
        {
            return $this->returnError('400', 'Sorry, The Installments did not found');
        }   
        return $this->returnData('Installments',$installments,'200','Installments has been returned successfully');
    }
}
