<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class OrderController extends Controller
{
    public function view($id)
    {
        $data = Http::get("https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders/$id.json?status=any")->json();    
        return view('admin.orders.index',['data'=>$data]);
    }

    public function save(Request $request)
    {
    $res = Http::get("https://5b56453e6397f31b04204cfcdacb92f3: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@kabbanifurniture.myshopify.com/admin/api/2021-04/orders.json?status=any");
    $data = json_decode($res->getBody()->getContents(), true);
    foreach($data as $items)
        foreach($items as $item)
            $order = Order::Create([
                'order_id'=>$item['id'],
                'order_number'=>$item['number'],
                'created_on'=>$item['created_at'],
                'closed_at'=>$item['closed_at'],
                'currency'=>$item['currency'],
                'order_status_url'=>$item['order_status_url'],
                'token'=>$item['token'],
                'total_discounts'=>$item['total_discounts'],
                'total_price'=>$item['total_price'],
                'contact_email'=>$item['contact_email'],
                'vendor'=>$item['line_items']['0']['vendor'],
                ]); // add $data here
            $order->save();
    return redirect()->route('admin.dashboard')->with(['success'=>'The Orders has been saved successfully']); 
    }
}
