<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() 
    {
        $roles = Role::get();
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(RolesRequest $request)
    {
        // return $request;
        try
        {    
            $role = $this->process(new Role, $request);
            if($role)
                return redirect()->route('admin.roles')->with(['success'=>'The Role has been saved successfully']);
            else
                return redirect()->route('admin.roles')->with(['error'=>'Something went wrong. Please try again']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.roles')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        if (! $role)
            {
                return redirect()->route('admin.roles')->with(['error'=>'Sorry, This Role not found']); 
            } 
                return view('admin.role.edit',compact('role'));
    }

    public function update($id , RolesRequest $request)
    {
        try
        {    
            $role = Role::findOrFail($id);
            if(!$role)
            return redirect()->route('admin.roles')->with(['error'=>'Sorry, This Role not found']); 
        
            $role = $this->process($role, $request);
            if($role)
                return redirect()->route('admin.roles')->with(['success'=>'The Role has been updated successfully']);
            else
                return redirect()->route('admin.roles')->with(['error'=>'Something went wrong. Please try again']);
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.roles')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        if(!$role)
            return redirect()->route('admin.roles')->with(['error'=>'Sorry, This Role not found']);
        $role->delete();
            return redirect()->route('admin.roles')->with(['success'=>'The role has been deleted successfully']);
    }

    public function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = json_encode($r->permissions);
        $role->save();
        return $role;
    }
}
