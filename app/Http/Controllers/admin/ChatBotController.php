<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatBotRequest;
use App\Models\ChatBot;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function index() 
    {
        $chatbots = ChatBot::get();
        return view('admin.chatbot.index',compact('chatbots'));
    }

    public function create() 
    {
        $chatbot = ChatBot::get();
        return view('admin.chatbot.create',compact('chatbot'));
    }

    public function store(ChatBotRequest $request)
    {
        // return $request;
        try
        {   
            ChatBot::create([
                'question'=>$request->question,
                'question_ar'=>$request->question_ar,
                'answer'=>$request->answer,
                'answer_ar'=>$request->answer_ar,
            ]);
            return redirect()->route('admin.chatBot')->with(['success'=>'The chat bot has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.chatBot')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $chatBot = ChatBot::findOrFail($id);

        if (! $chatBot)
            {
                return redirect()->route('admin.chatBot')->with(['error'=>'Sorry, This Chat Bot not found']); 
            } 
            return view('admin.chatbot.edit', compact('chatBot'));    
    }

    public function update($id , ChatBotRequest $request) 
    {
        // return $request;
        $chatBot = ChatBot::findOrFail($id);
        if(!$chatBot)
        return redirect()->route('admin.chatBot')->with(['error'=>'Sorry, This Chat Bot not found']); 

        // Update data
        $request = ChatBot::where('id',$id)->update([
            'question'=>$request->question,
            'question_ar'=>$request->question_ar,
            'answer'=>$request->answer,
            'answer_ar'=>$request->answer_ar,
        ]);
        return redirect()->route('admin.chatBot')->with(['success'=>'The chat bot has been modified successfully']); 
    }

    public function destroy($id)
    {
        $chatBot = ChatBot::findOrFail($id);
        $chatBot->delete();
        return redirect()->route('admin.chatBot')->with(['success'=>'The chat bot has been deleted successfully']);
    }

}

