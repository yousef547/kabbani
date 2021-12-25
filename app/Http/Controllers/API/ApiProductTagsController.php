<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductTags;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiProductTagsController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $tags = ProductTags::get();
        if(!$tags)
        {
            return $this->returnError('400', 'Sorry, The Tags did not found');
        }   
        return $this->returnData('Tags',$tags,'200','Tags has been returned successfully');
    }
 
}
