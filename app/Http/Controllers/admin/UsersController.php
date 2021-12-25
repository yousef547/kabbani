<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Seller;

class UsersController extends Controller
{
    public function index()
    {
        $users = Admin::get();  
        $roles = Role::get();
        $sellers = Seller::get();

        return view('admin.users.index',compact('users','roles','sellers'));
    }

    public function create()
    {
        $roles = Role::get();
        $sellers = Seller::get();
        return view('admin.users.create',compact('roles','sellers'));
    }

    public function store(UsersRequest $request)
    {
        // return $request;
        try
        {
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->seller_id = $request->seller_id;
            // Save in DB
            if($user->save())
                return redirect()->route('admin.users')->with(['success'=>'The User has been saved successfully']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.users')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::get();
        $sellers = Seller::get();

        if (! $user)
            {
                return redirect()->route('admin.users')->with(['error'=>'Sorry, This User not found']); 
            } 
            return view('admin.users.edit', compact('user','roles','sellers'));    
    }

    public function update($id , UsersRequest $request) 
    {
        // dd($request) ;

        $user = Admin::findOrFail($id);
        
        if(!$user)
        return redirect()->route('admin.users')->with(['error'=>'Sorry, This User not found']); 

        // Update data
        Admin::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role_id,
            'seller_id'=>$request->seller_id
        ]);
        return redirect()->route('admin.users')->with(['success'=>'The User has been modified successfully']); 

    }

    public function destroy($id)
    {

        $user = Admin::findOrFail($id);
        if(!$user)
        return redirect()->route('admin.sellers')->with(['error'=>'Sorry, This User not found']);        
        $user->delete();
        return redirect()->route('admin.sellers')->with(['success'=>'The User has been deleted successfully']);
    }
}
