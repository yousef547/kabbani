<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
class TagController extends Controller
{
    public function index() 
    {
        $tags = Tag::get();
        return view('admin.tag.index',compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        // return $request;
        try
        {            
            Tag::create([
                'tag_name'=>$request->tag_name,
            ]);
            return redirect()->route('admin.tags.create')->with(['success'=>'The Tag has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.tags')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        if (! $tag)
            {
                return redirect()->route('admin.tags')->with(['error'=>'Sorry, This Tag not found']); 
            } 
            return view('admin.tag.edit', compact('tag','sub_categories'));    
    }

    public function update($id , TagRequest $request) 
    {

        $tag = Tag::findOrFail($id);
        if(!$tag)
        return redirect()->route('admin.tags')->with(['error'=>'Sorry, This Tag not found']); 

        // Update data
        $request = Tag::where('id',$id)->update([
            'tag_name'=>$request->tag_name,
        ]);
        return redirect()->route('admin.tags')->with(['success'=>'The Tag has been modified successfully']); 
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tags')->with(['success'=>'The Tag has been deleted successfully']);
    }

}
