<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;


class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; 

    protected $fillable = [
        'name', 'email', 'password', 'seller_id' , 'role_id' , 'remember_token' , 'created_at', 'updated_at'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function hasAbility($permissions)
    {
        $role = $this->role;
        if(!$role) {
            return false;
        }
        foreach($role->permissions as $permission)
        {
            if(is_array($permissions) && in_array($permission , $permissions))
            {
                return true;
            }
            else if(is_string($permissions) && strcmp($permissions , $permission) == 0)
            {
                return true;
            }
        }
        return false;
    }
}

