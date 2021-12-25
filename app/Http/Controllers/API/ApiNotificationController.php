<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;


class ApiNotificationController extends Controller
{
    use GeneralTrait;

    public function index() 
    {
        $notifications = Notification::get();

        if(!$notifications)
        {
            return $this->returnError('400', 'Sorry, The Notifications did not found');
        }   
        return $this->returnData('Notifications',$notifications,'200','Notifications has been returned successfully');
    }

    public function store(NotificationRequest $request)
    {
        // return $request;
        try
        {   
            $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('notifications',$request->photo);
            }         
            $notification = Notification::create([
                'user_id'=>$request->user_id,
                'message'=>$request->message,
                'notification_date'=>$request->notification_date,
                'photo'=>$filePath,
            ]);

        if(!$notification)
        {
            return $this->returnError('400', 'Sorry, The Notification did not found');
        }   
        return $this->returnData('Notification',$notification,'200','Notification has been stored successfully');
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.notifications')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function update($id , NotificationRequest $request) 
    {
        $filePath = "";
        if($request->has('photo'))
        {
            $filePath=uploadImage('notifications',$request->photo);
        }      
        // Update data
        $notification = Notification::where('id',$id)->update([
            'user_id'=>$request->user_id,
            'message'=>$request->message,
            'notification_date'=>$request->notification_date,
            'photo'=>$filePath,
        ]);
        
        if(!$notification)
        {
            return $this->returnError('400', 'Sorry, The Notification did not found');
        }   
        return $this->returnData('Notification',$notification,'200','Notification has been updated successfully');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        if(!$notification)
        {
            return $this->returnError('400', 'Sorry, The Notification did not found');
        }   
        return $this->returnData('Notification',$notification,'200','Notification has been deleted successfully');
    }

}