<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CountDown;
use App\Http\Traits\GeneralTrait;

class ApiCountDownController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $countDowns = CountDown::get();
        
        if(!$countDowns)
        {
            return $this->returnError('400', 'Sorry, The Count Down did not found');
        }   
        return $this->returnData('Count Down',$countDowns,'200','Count Down has been returned successfully');    }
}
