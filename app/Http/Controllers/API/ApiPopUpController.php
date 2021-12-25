<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Models\PopUp;

class ApiPopUpController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $popups = PopUp::get();    

        if(!$popups)
        {
            return $this->returnError('400', 'Sorry, The PopUp did not found');
        }   
        return $this->returnData('PopUp',$popups,'200','PopUp has been returned successfully');
    }
}
