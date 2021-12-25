<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('admin.includes.dashboard');
    }

    public function changeStatus($id)
    {
        $seller = Seller::findOrFail($id);
        if(!$seller)
        return redirect()->route('admin.dashboard')->with(['error'=>'Sorry, This Seller not found']); 
    
        // Change Status
        $status = $seller->active == 0 ? 1 : 0 ;
        $seller -> update(['active' => $status]);
        return redirect()->route('admin.dashboard')->with(['success'=>'The Status has been Changed successfully']);

    }
}
