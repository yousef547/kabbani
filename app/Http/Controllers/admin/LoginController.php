<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Auth;





class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.Login');
    }

    public function handleLogin(LoginRequest $request)
    {

        // Check in DB
        if(auth()->guard('admin')->attempt(['email'=>$request->input('email'), 'password' =>$request->input('password')]))
        {
            // notify()-> success ('تم الدخول بنجاح');

            return redirect()->route('admin.dashboard')->with(['success' => 'Welcome, You are logged in successfully']);
        }
        else 
        {
            // notify()-> error ('خطأ فى البيانات برجاء المحاولة مرة أخرى');
            return redirect()->route('admin_login')->with(['error' => 'There is something error, PLease try again']);
        }
    }

    public function editProfile($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.auth.profile',compact('admin'));
    }

    public function updateProfile(ProfileRequest $request, $id)
    {
        try{
            $admin = Admin::findOrFail($id);
            if(!$admin)
            return redirect()->route('admin.dashboard')->with(['error'=>'Sorry, This Admin not found']); 
        
            Admin::where('id' , $id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role_id'=>1,
                'is_supervisor'=>1,
            ]);
            
            return redirect()->route('admin.dashboard')->with(['success' => 'Congratulations, You updated your profile now']);
        }
        catch(Exception $ex){
            return $ex;
        return redirect()->back()->with(['error' => 'There is something error, PLease try again']);
        }

    }

    public function logout()
    {
        Auth::logout();
        return view('admin.auth.Login');
    }
}
