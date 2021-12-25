<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SplashScreenRequest;
use App\Models\SplashScreen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SplashScreenController extends Controller
{ 
    public function index()
    {
        $splashScreen = SplashScreen::get();
        return view('admin.splashScreen.index',compact('splashScreen'));
    }

    public function create()
    {
        $splashScreens = SplashScreen::get();
        if ($splashScreens)
        {
            foreach($splashScreens as $splashScreen)
                return view('admin.splashScreen.edit',compact('splashScreen'))->with(['success'=>'The Splash Screen has been created, you can edit it now only']);
        }
        else
        {
            return view('admin.splashScreen.create');
        }                
    }

    public function store(SplashScreenRequest $request)
    {
        // return $request;
        try
        {
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('splashScreen',$request->photo);
            }
            SplashScreen::create([
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.splashScreen')->with(['success'=>'The Splash Screen has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.splashScreen')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $splashScreen = SplashScreen::findOrFail($id);

        if (! $splashScreen)
            {
                return redirect()->route('admin.splashScreen')->with(['error'=>'Sorry, This Splash Screen not found']); 
            } 
            return view('admin.splashScreen.edit', compact('splashScreen'));    
    }

    public function update($id , SplashScreenRequest $request) 
    {
        $splashScreen = SplashScreen::findOrFail($id);
        
        if(!$splashScreen)
        return redirect()->route('admin.splashScreen')->with(['error'=>'Sorry, This Splash Screen not found']); 

        // Update data
        if($request->hasFile('photo'))
        {
            $image = Str::after($splashScreen->photo, 'assets/');
            $image = base_path('assets/'.$image);
            unlink($image);
             $filePath=uploadImage('splashScreen',$request->photo);
            // Save Photo
            SplashScreen::where('id',$id)->update([
                'photo'=>$filePath,
            ]);
        }
        return redirect()->route('admin.splashScreen')->with(['success'=>'The Splash Screen has been modified successfully']); 

    }

    public function destroy($id)
    {

        $splashScreen = SplashScreen::findOrFail($id);
        if(!$splashScreen)
            return redirect()->route('admin.splashScreen')->with(['error'=>'Sorry, This Splash Screen not found']);

        $splashScreen->delete();
        return redirect()->route('admin.splashScreen')->with(['success'=>'The Splash Screen has been deleted successfully']);
    }
}
