<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WheelRequest;
use App\Models\Wheel;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiWheelController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $wheel_gifts = Wheel::get();
        
        foreach($wheel_gifts as $wheel)
        
        if($wheel->active == 0)
        {
            return $this->returnError('400', 'Sorry, The Wheel Gifts are hide');
        } 
         
        return $this->returnData('Wheel Gifts',$wheel_gifts,'200','Wheel Gifts has been returned successfully');

    }

}
