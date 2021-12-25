<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() 
    {
        $customers = Customer::get();
        $chats = Chat::get();
        return view('admin.chat_room.index',compact('chats','customers'));
    }

    public function create() 
    {
        $customers = Customer::get();
        $chat = Chat::get();
        return view('admin.chat_room.create',compact('chat','customers'));
    }

    public function store(ChatRequest $request)
    {
        // return $request;
        try
        {   
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('chats',$request->photo);
            }         
            Chat::create([
                'user_id'=>$request->user_id,
                'user_type'=>$request->user_type,
                'message'=>$request->message,
                'chat_date'=>$request->chat_date,
                'photo'=>$filePath,
            ]);
            return redirect()->route('admin.chat')->with(['success'=>'The Chat has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.chat')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $chat = Chat::findOrFail($id);

        if (! $chat)
            {
                return redirect()->route('admin.chat')->with(['error'=>'Sorry, This Chat not found']); 
            } 
            return view('admin.chat_room.edit', compact('chat'));    
    }

    public function update($id , ChatRequest $request) 
    {
        // return $request;
        $chat = Chat::findOrFail($id);
        if(!$chat)
        return redirect()->route('admin.chat')->with(['error'=>'Sorry, This Chat not found']); 

        $filePath = "";
        if($request->has('photo'))
        {
            $filePath=uploadImage('chats',$request->photo);
        }      
        // Update data
        $request = Chat::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'user_type'=>$request->user_type,
            'message'=>$request->message,
            'chat_date'=>$request->chat_date,
            'photo'=>$filePath,
        ]);
        return redirect()->route('admin.chat')->with(['success'=>'The Chat has been modified successfully']); 
    }

    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();
        return redirect()->route('admin.chat')->with(['success'=>'The Chat has been deleted successfully']);
    }

}
