<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class ApiVideoController extends Controller
{
    use GeneralTrait;
    public function index() 
    {
        $videos = Video::get();

       if(!$videos)
        {
            return $this->returnError('400', 'Sorry, Videos did not found');
        }   
        return $this->returnData('Videos',$videos,'200','Videos has been returned successfully');
    }
}
