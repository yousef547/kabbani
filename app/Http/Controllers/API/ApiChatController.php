<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiChatController extends Controller
{
    use GeneralTrait;
    public function index($id) 
    {
        $chats = Chat::get()->where('user_id',$id)->reverse()->values();
        
        if(!$chats)
        {
            return $this->returnError('400', 'Sorry, The Chats did not found');
        }   
        return $this->returnData('Chats',$chats,'200','Chats has been returned successfully');
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
            $chat = Chat::create([
                'user_id'=>$request->user_id,
                'user_type'=>$request->user_type,
                'message'=>$request->message,
                'chat_date'=>$request->chat_date,
                'photo'=>$filePath,
            ]);
            if(!$chat)
            {
                return $this->returnError('400', 'Sorry, The Chat did not found');
            }   
            return $this->returnData('Chat',$chat,'200','Chats has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.chat')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , ChatRequest $request) 
    {
        $filePath = "";
        if($request->has('photo'))
        {
            $filePath=uploadImage('chats',$request->photo);
        }      
        // Update data
        $chat = Chat::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'user_type'=>$request->user_type,
            'message'=>$request->message,
            'chat_date'=>$request->chat_date,
            'photo'=>$filePath,
        ]);
        
        if(!$chat)
        {
            return $this->returnError('400', 'Sorry, The Chat did not found');
        }   
        return $this->returnData('Chat',$chat,'200','Chats has been updated successfully');
    }

    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();

        if(!$chat)
        {
            return $this->returnError('400', 'Sorry, The Chat did not found');
        }   
        return $this->returnData('Chat',$chat,'200','Chats has been deleted successfully');
    }
}
