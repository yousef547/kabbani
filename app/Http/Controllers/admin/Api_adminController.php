<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin_ApiRequest;
use App\Models\Api_admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Api_adminController extends Controller
{
    public function index()
    {
        $users = Api_admin::get();  
        return view('admin.admin_api.index',compact('users'));
    }

    public function create()
    {
        return view('admin.admin_api.create');
    }

    public function store(Admin_ApiRequest $request)
    {
        Api_admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'access_token'=>Str::random(64)
        ]);
        return redirect()->route('admin.userApi')->with(['success'=>'The user has been created successfully']); 
    }
}