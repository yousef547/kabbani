<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SplashScreenRequest;
use App\Models\SplashScreen;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class ApiSplashScreenController extends Controller
{
    use GeneralTrait;
    
    public function index()
    {
        $splashScreen = SplashScreen::get();
        
         if(!$splashScreen)
        {
            return $this->returnError('400', 'Sorry, The Splash Screen did not found');
        }   
        return $this->returnData('Splash Screen',$splashScreen,'200','Splash Screen has been returned successfully');
    }
}

