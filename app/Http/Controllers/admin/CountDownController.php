<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CountDown;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class CountDownController extends Controller
{
    public function index() 
    {
        $countDowns = CountDown::get();
        return view('admin.countDown.index',compact('countDowns'));
    }

    public function changeStatus($id)
    {
        $countDown = CountDown::findOrFail($id);
        if(!$countDown)
        return redirect()->route('admin.countDowns')->with(['error'=>'Sorry, This Count Dwon not found']); 
    
        // Change Status
        $status = $countDown->active == 0 ? 1 : 0 ;
        $countDown -> update(['active' => $status]);
        return redirect()->route('admin.countDowns')->with(['success'=>'The Status has been Changed successfully']);
    }

    public function create() 
    {
        return view('admin.countDown.create');
    }

    public function store(Request $request)
    {
        $fdate = $request->fdate;
        $tdate = $request->tdate;
        $from = Carbon::createFromFormat('Y-m-d', $fdate);
        $to = Carbon::createFromFormat('Y-m-d', $tdate);
        $init = $from->diffIndays($to);
        // return $init;
        try
        {   
            CountDown::create([
                'title'=>$request->title,
                'title_ar'=>$request->title_ar,
                'tdate' => $tdate,
                'days'=>$init,
            ]);
            return redirect()->route('admin.countDowns')->with(['success'=>'The Count Down has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.countDowns')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $countDown = CountDown::findOrFail($id);

        if (! $countDown)
            {
                return redirect()->route('admin.countDowns')->with(['error'=>'Sorry, This Count Down not found']); 
            } 
            return view('admin.countDown.edit', compact('countDown'));    
    }

    public function update($id , Request $request) 
    {
        // return $request;
        $countDown = CountDown::findOrFail($id);
        if(!$countDown)
        return redirect()->route('admin.countDowns')->with(['error'=>'Sorry, This Count Down not found']); 

        $fdate = $request->fdate;
        $tdate = $request->tdate;
        $from = Carbon::createFromFormat('Y-m-d', $fdate);
        $to = Carbon::createFromFormat('Y-m-d', $tdate);
        $init = $from->diffIndays($to);
        
        // Update data
        $request = CountDown::where('id',$id)->update([
            'title'=>$request->title,
            'title_ar'=>$request->title_ar,
            'tdate' => $request->tdate,
            'days'=>$init,
        ]);
        return redirect()->route('admin.countDowns')->with(['success'=>'The Count Down has been modified successfully']); 
    }

    public function destroy($id)
    {
        $countDown = CountDown::findOrFail($id);
        $countDown->delete();
        return redirect()->route('admin.countDowns')->with(['success'=>'The Count Down has been deleted successfully']);
    }
}
