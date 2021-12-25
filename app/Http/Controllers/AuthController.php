<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('front.customers.index',compact('customers'));
    } 

    public function register()
    {
        return view('front.customers.register');
    } 

    public function handleRegister(RegisterRequest $request)
    {
        $customer = $this->process(new Customer, $request);
        
        if($customer)
            return redirect()->route('customer.login')->with(['success'=>'The Customer has been saved successfully']);
        else
            return redirect()->route('customer.register')->with(['error'=>'Something went wrong. Please try again']);
    }

    public function getLogin()
    {
        return view('front.customers.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        // Check in DB
        if(auth()->guard('customer')->attempt(['email'=>$request->input('email'), 'password' =>$request->input('password')]))
        {
            // notify()-> success ('تم الدخول بنجاح'));
            return redirect()->route('front.includes.home')->with(['success' => 'Your are logged in successfully']);
        }
        else 
        {
            // notify()-> error ('خطأ فى البيانات برجاء المحاولة مرة أخرى');
            return redirect()->back()->with(['error' => 'There is something error, PLease try again']);
        }

    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        if (! $customer)
        {
            return redirect()->route('front.includes.home')->with(['error'=>'Sorry, This Customer not found']); 
        }
        return view('front.customers.edit',compact('customer'));
    }

    public function update(LoginRequest $request,$id)
    {
        try
        {    
            $customer = Customer::findOrFail($id);
            if(!$customer)
            return redirect()->route('front.includes.home')->with(['error'=>'Sorry, This Role not found']); 
        
            $customer = $this->process($customer, $request);
            if($customer)
                return redirect()->route('front.includes.home')->with(['success'=>'The Customer has been updated successfully']);
            else
                return redirect()->route('front.includes.home')->with(['error'=>'Something went wrong. Please try again']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('front.includes.home')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('customer.login');
    }

    // Github Login
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    // Github handleLogin
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $email = $user->email;
        $db_user = Customer:: where('email','=',$email)->first();
        if ($db_user == null) {
            $user = Customer::create([
                'name' =>$user->name,
                'email' =>$user->email,
                'password' =>Hash::make('12345678'),
                'ouath_token' =>$user->token,
            ]);
            return view('front.includes.home');
        }
        else {
            return view('front.includes.home');
        }

        return view('front.includes.home');
    }

    // Facebook Login
    public function redirectToProviderFace()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook handleLogin
    public function handleProviderCallbackFace()
    {
        $user = Socialite::driver('facebook')->user();
        $email = $user->email;
        $db_user = Customer:: where('email','=',$email)->first();
        if ($db_user == null) {
            $user = Customer::create([
                'name' =>$user->name,
                'email' =>$user->email,
                'password' =>Hash::make('12345678'),
                'ouath_token' =>$user->token,
            ]);
            return view('front.includes.home');
        }
        else {
            return view('front.includes.home');
        }

        return view('front.includes.home');
    }

     // Google Login
     public function redirectToProviderGoo()
     {
         return Socialite::driver('google')->redirect();
     }
 
     // Google handleLogin
     public function handleProviderCallbackGoo()
     {
         $user = Socialite::driver('google')->user();
         $email = $user->email;
         $db_user = Customer:: where('email','=',$email)->first();
         if ($db_user == null) {
             $user = Customer::create([
                 'name' =>$user->name,
                 'email' =>$user->email,
                 'password' =>Hash::make('12345678'),
                 'ouath_token' =>$user->token,
             ]);
             return view('front.includes.home');
        }
         else {
            return view('front.includes.home');
        }
 
        return view('front.includes.home');
    }

    public function process(Customer $customer, Request $request)
    {
        $customer->name = $request->name; 
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->address = $request->address;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->save();
        return $customer;
    }
}
