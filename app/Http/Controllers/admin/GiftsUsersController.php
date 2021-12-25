<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiftsUsersRequest;
use App\Models\GiftsUsers;
use App\Models\Wheel;

class GiftsUsersController extends Controller
{
    public function index() 
    {
        $users_gifts = GiftsUsers::get();
        $Customers = Customer::get();
        $Wheel_gifts = Wheel::get();
        return view('admin.gifts_users.index',compact('users_gifts','Customers','Wheel_gifts'));
    }

    public function store(GiftsUsersRequest $request)
    {
        // return $request;
        try
        {            
            GiftsUsers::create([
                'user_id'=>$request->user_id,
                'wheel_id'=>$request->wheel_id,
            ]);
            return redirect()->route('admin.gifts_users')->with(['success'=>'The User Gift has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.gifts_users')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $user_gift = GiftsUsers::findOrFail($id);

        if (! $user_gift)
            {
                return redirect()->route('admin.gifts_users')->with(['error'=>'Sorry, This User Gift not found']); 
            } 
            return view('admin.gifts_users.edit', compact('user_gift'));    
    }

    public function update($id , GiftsUsersRequest $request) 
    {

        $user_gift = GiftsUsers::findOrFail($id);
        if(!$user_gift)
        return redirect()->route('admin.gifts_users')->with(['error'=>'Sorry, This User Gift not found']); 

        // Update data
        $request = GiftsUsers::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'wheel_id'=>$request->wheel_id,
        ]);
        return redirect()->route('admin.gifts_users')->with(['success'=>'The User Gift has been modified successfully']); 
    }

    public function destroy($id)
    {
        $user_gift = GiftsUsers::findOrFail($id);
        $user_gift->delete();
        return redirect()->route('admin.gifts_users')->with(['success'=>'The User Gift has been deleted successfully']);
    }

}