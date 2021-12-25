<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() 
    {
        $customers = Customer::get();
        $notifications = Notification::get();
        $products= Product::get();
        return view('admin.notifications.index',compact('notifications','customers','products'));
    }

    public function create() 
    {
        $customers = Customer::get();
        $notification = Notification::get();
        $products= Product::get();
        return view('admin.notifications.create',compact('notification','customers','products'));
    }

    public function store(NotificationRequest $request)
    {
        
        $firebaseToken = Customer::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        $SERVER_API_KEY = env('FCM_SERVER_KEY');
        // return $request;
        try
        {   
            $filePath = "";
            if($request->has('image'))
            {
                $filePath=uploadImage('notifications',$request->image);
            }         
            Notification::create([
                'product_id'=>$request->product_id,
                'title' => $request->title,
                'body'=>$request->body,
                'notification_date'=>$request->notification_date,
                'image'=>$filePath,
            ]);
            
           $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "product_id"=>$request->product_id,
                "title" => $request->title,
                "body" => $request->body,
                'image'=>"https://thedwo.com/kabbani/".$filePath,
            ]
        ];
        
        // return $data;
            
        $dataString = json_encode($data);
        
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
      
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        
        // return $result;

        
        return redirect()->route('admin.notifications')->with(['success'=>'The notification has been saved successfully']);
    }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.notifications')->with(['error'=>'Something went wrong. Please try again']);
        }
    }

    public function edit($id)
    {
        $customers = Customer::get();
        $notification = Notification::findOrFail($id);
        $products= Product::get();

        if (! $notification)
            {
                return redirect()->route('admin.notifications')->with(['error'=>'Sorry, This notification not found']); 
            } 
            return view('admin.notifications.edit', compact('notification','customers','products'));    
    }

    public function update($id , NotificationRequest $request) 
    {
        // return $request;
        $notification = Notification::findOrFail($id);
        if(!$notification)
        return redirect()->route('admin.notifications')->with(['error'=>'Sorry, This Notification not found']); 

        $filePath = "";
        if($request->has('image'))
        {
            $filePath=uploadImage('notifications',$request->image);
        }      
        // Update data
        Notification::where('id',$id)->update([
                'product_id'=>$request->product_id,
                'title' => $request->title,
                'body'=>$request->body,
                'notification_date'=>$request->notification_date,
                'image'=>$filePath,
        ]);
        
         $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "product_id"=>$request->product_id,
                "title" => $request->title,
                "body" => $request->body,
                'image'=>$filePath,
            ]
        ];
        
         $dataString = json_encode($data);
      
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
      
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);        
        // return $response;
        return redirect()->route('admin.notifications')->with(['success'=>'The Notification has been modified successfully']); 
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect()->route('admin.notifications')->with(['success'=>'The Notification has been deleted successfully']);
    }

}
