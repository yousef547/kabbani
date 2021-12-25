<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiftsUsersRequest;
use App\Models\GiftsUsers;
use App\Http\Traits\GeneralTrait;


class ApiGiftsUsersController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $users_gifts = GiftsUsers::get();
        
        if(!$users_gifts)
        {
            return $this->returnError('400', 'Sorry, The User Gifts did not found');
        }   
        return $this->returnData('User Gifts',$users_gifts,'200','User Gifts has been returned successfully');
    }

    public function store(GiftsUsersRequest $request)
    {
        // return $request;
        try
        {            
            $user_gift = GiftsUsers::create([
                'user_id'=>$request->user_id,
                'wheel_id'=>$request->wheel_id,
            ]);
            if(!$user_gift)
        {
            return $this->returnError('400', 'Sorry, The User Gift did not found');
        }   
        return $this->returnData('User Gift',$user_gift,'200','User Gifts has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.gifts_users')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , GiftsUsersRequest $request) 
    {
        // Update data
        $user_gift = GiftsUsers::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'wheel_id'=>$request->wheel_id,
        ]);
        if(!$user_gift)
        {
            return $this->returnError('400', 'Sorry, The User Gift did not found');
        }   
        return $this->returnData('User Gift',$user_gift,'200','User Gifts has been updated successfully');
    }
    public function destroy($id)
    {
        $user_gift = GiftsUsers::findOrFail($id);
        $user_gift->delete();
        
        if(!$user_gift)
        {
            return $this->returnError('400', 'Sorry, The User Gift did not found');
        }   
        return $this->returnData('User Gift',$user_gift,'200','User Gifts has been deleted successfully');
    }
}