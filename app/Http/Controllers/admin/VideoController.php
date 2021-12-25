<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() 
    {
        $videos = Video::get();
        return view('admin.videos.index',compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(VideoRequest $request)
    {
        // return $request;
        try
        {            
            Video::create([
                'name'=>$request->name,
                'url'=>$request->url
            ]);
            return redirect()->route('admin.videos')->with(['success'=>'The Video has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.videos')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);

        if (! $video)
            {
                return redirect()->route('admin.videos')->with(['error'=>'Sorry, This Video not found']); 
            } 
            return view('admin.videos.edit', compact('video'));    
    }

    public function update($id , VideoRequest $request) 
    {

        $video = Video::findOrFail($id);
        if(!$video)
        return redirect()->route('admin.videos')->with(['error'=>'Sorry, This Video not found']); 

        // Update data
        $request = Video::where('id',$id)->update([
            'name'=>$request->name,
            'url'=>$request->url
        ]);
        return redirect()->route('admin.videos')->with(['success'=>'The Video has been modified successfully']); 
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('admin.videos')->with(['success'=>'The Video has been deleted successfully']);
    }

}
