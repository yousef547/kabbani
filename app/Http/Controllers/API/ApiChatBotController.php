<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatBotRequest;
use App\Models\ChatBot;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiChatBotController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $chatbots = ChatBot::get();
        
        if(!$chatbots)
        {
            return $this->returnError('400', 'Sorry, The Chat bots did not found');
        }   
        return $this->returnData('Chat Bots',$chatbots,'200','Chat bots has been returned successfully');
    }

    public function store(ChatBotRequest $request)
    {
        // return $request;
        $chatBot = ChatBot::create([
                'question'=>$request->question,
                'question_ar'=>$request->question_ar,
                'answer'=>$request->answer,
                'answer_ar'=>$request->answer_ar,
            ]);
            if(!$chatBot)
        {
            return $this->returnError('400', 'Sorry, The Chat bot did not found');
        }   
        return $this->returnData('Chat Bot',$chatBot,'200','Chat bots has been saved successfully');
    }

    public function update($id , ChatBotRequest $request) 
    {
        // return $request;
        $chatBot = ChatBot::findOrFail($id);

        if(!$chatBot)
        {
            return $this->returnError('400', 'Sorry, The Chat bot did not found');
        }   
        // Update data
        $chatBot = ChatBot::where('id',$id)->update([
            'question'=>$request->question,
            'question_ar'=>$request->question_ar,
            'answer'=>$request->answer,
            'answer_ar'=>$request->answer_ar,
        ]);
        return $this->returnData('Chat Bot',$chatBot,'200','Chat bots has been updated successfully');
    }

    public function destroy($id)
    {
        $chatBot = ChatBot::findOrFail($id);
        $chatBot->delete();
        
        return $this->returnData('Chat Bot',$chatBot,'200','Chat bots has been updated successfully');
    }

}