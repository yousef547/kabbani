<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Http\Traits\GeneralTrait;
use App\User;

class ApiAuthController extends Controller
{
    use GeneralTrait;

    public function register(RegisterRequest $request)
    {    
         $user = Customer::create([ 
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'password'=>Hash::make($request->password),
            'access_token'=> Str::random(64),
            'fcm_token'=>$request->fcm_token
        ]);

        if(!$user)
            {
                return $this->returnError('400', 'Sorry, This Customer did not created');
            }   
            return $this->returnData('Customer',$user,'200','New customer has been created successfully');
    }
    
    public function login(LoginRequest $request) 
    {
        $is_user = auth()->guard('customer')->attempt(['email' => $request->email, 'password' => $request->password]);
        
        if(! $is_user)
        {
            return $this->returnError('400', 'Sorry, This Customer not loginned');
        }
            $user = Customer::where('email' , '=' , $request->email)->first();
            $new_access_token = Str::random(64); 
            return $this->returnData('Customer',$user,'200','Customer has been Loginned successfully');
    }

    public function update(LoginRequest $request,$id)
    {
        $user = Customer::findOrFail($id);
        if(!$user)
        {
            return $this->returnError('400', 'Sorry, This Customer not found');
        }

        $user = Customer::where('email' , '=' , $request->email)->first();
        
        $user = Customer::create([ 
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'password'=>Hash::make($request->password),
            'access_token'=> Str::random(64),
            'fcm_token'=>$request->fcm_token
        ]);

        return $this->returnData('Customer',$user,'200','Customer has been updated his profile successfully');
    }

    public function logout(Request $request)
    {
        $access_token = $request->access_token;

        $user = Customer::where('access_token' , $access_token)->first();

        if ($user == null)
        {
            return $this->returnError('400', 'Sorry, This token not correct');
        }
        else 
        {
            $user->update(['access_token'=>NULL]);
        }
        
    return $this->returnData('Customer',$user,'200','Customer has been Loged out successfully');
    }    
}
