<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.pushnotification',compact('products'));
    } 
  
    
    public function sendNotification(Request $request)
    {
        $firebaseToken = Customer::whereNotNull('fcm_token')->pluck('fcm_token')->all();
            
        $SERVER_API_KEY = env('FCM_SERVER_KEY');
        
        $filePath = "";
            if($request->has('photo'))
            {
                $filePath=uploadImage('notifications',$request->photo);
            }         

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "product_id"=>$request->product_id,
                "title" => $request->title,
                "body" => $request->body,
                'photo'=>$filePath,
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
                 
        $response = curl_exec($ch);
        
        // return $response;
    
        return back()->with('success', 'Notification send successfully.');
    }
}
