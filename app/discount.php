<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table = 'discounts';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function discount($dis = null) {
        
        return json_decode($this->discount)->$dis;
    }
    public function active($act = null) {
        if($this->active == "not_active"){
            return true;
        } else {
            return false;
        }
    }
}
