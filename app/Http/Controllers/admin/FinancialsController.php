<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancialsController extends Controller
{
    public function accountSummary()
    {
        return view(route('admin.financials.accountSummary'));
    }

    public function requestWithdrawal()
    {
        return view(route('admin.financials.requestWithdrawal'));
    }

    public function withdrawalStatus()
    {
        return view(route('admin.financials.withdrawalStatus'));
    }

    public function compensation()
    {
        return view(route('admin.financials.compensation'));
    }
}
