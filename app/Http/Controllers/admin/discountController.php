<?php

namespace App\Http\Controllers\admin;

use App\discount;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Http\Request;

class discountController extends Controller
{
    public function create()
    {
        $data['products'] = Product::get();
        return view('admin.discount.create')->with($data);
        // dd($allDiscount);
    }

    public function getProduct($id)
    {
        $priceProduct = Product::find($id);
        return response()->json([
            "price" => $priceProduct->price,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "product_id" => "required|exists:products,id",
            "start_date" => "required|sometimes",
            "end_date" => "required|sometimes",
        ]);
        $priceProduct = Product::where('id', $request->product_id)->select("price")->first();

        if ($request->discount == null) {
            $request->validate([
                "percentage" => "required|numeric|between:1,100",
            ]);
            $afterPrice = $priceProduct->price - ($priceProduct->price * (int)$request->percentage / 100);
        } elseif ($request->percentage == null) {
            $request->validate([
                "discount" => "required|numeric",
            ]);

            $afterPrice = $priceProduct->price - $request->discount;
            if ($afterPrice < 1) {
                $request->session()->flash('error', 'Discount greater than or equal to Product price');
                return back();
            }
        }
        discount::create([
            "product_id" => $request->product_id,
            "startDate" => Carbon::parse($request->start_date)->timestamp,
            "endDate" => Carbon::parse($request->end_date)->timestamp,
            "discount" => json_encode([
                'percentage' => $request->percentage,
                'discount' => $request->discount
            ]),
            "afterDiscount" => $afterPrice
        ]);
        $request->session()->flash('error', 'Successed create Discount');
        return  redirect()->route('admin.discount.show');
        //Carbon::parse($request->from)->timestamp
        // dd($afterPrice);
    }

    public function show()
    {
        $data['updateDiscount'] = discount::all();
        $now = Carbon::now('Africa/Cairo')->timestamp;
        // $fdate = Carbon::parse($now)->format('y-m-d');
        for ($i = 0; $i < count($data['updateDiscount']); $i++) {
            if ($now >= (int)$data['updateDiscount'][$i]->startDate) {
                $data['updateDiscount'][$i]->update([
                    "remaining_time" => $now,
                    "active" => 'active'
                ]);
            }
        }
        for ($i = 0; $i < count($data['updateDiscount']); $i++) {
            if ($now > (int)$data['updateDiscount'][$i]->endDate) {
                $data['updateDiscount'][$i]->update([
                    // "startDate" => $now,
                    "active" => 'not_active'
                ]);
            }
        }
        // dd($now);
        $data['discountProducts'] = discount::join("products", "product_id", "products.id")
            ->select("products.product_name", "products.name_ar", "products.id", "products.price", "products.photo", "discounts.*")
            ->get();
        $ldate = Carbon::now('Africa/Cairo');
        $fdate = Carbon::parse($ldate)->format('H:i:s');
        $data['hours'] = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('H');
        $data['munits'] = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('i');
        $data['second'] = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('s');

        // // $tdate = Carbon::parse((int)$data['discountProduct']->endDate)->format('y-m-d');;
        // // $from =  Carbon::createFromDate($fdate);
        // // $to = Carbon::createFromDate($tdate);
        // // $period = CarbonPeriod::create($from , $to );
        // // $data['dates'] = $period->toArray();   
        // dd(Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('H:i:s')  );
        return view('admin.discount.show')->with($data);
    }

    public function deleteDiscount($id, Request $request)
    {
        $delete = discount::find($id);
        $delete->delete();
        $request->session()->flash('error', 'Successed Deleted Discount');
        return  redirect()->route('admin.discount.show');
    }
    public function editDiscount($id, Request $request)
    {
        $data['idDiscount'] = discount::find($id);
        if ($data['idDiscount'] == null) {
            $request->session()->flash('error', 'Error ID Not Found');
            return back();
        }
        $data['idproduct'] = Product::find($data['idDiscount']->product_id);
        $data['products'] = Product::get();
        return view('admin.discount.edit')->with($data);
    }
    public function update(Request $request)
    {
        $request->validate([
            "idDiscount" => "required|exists:discounts,id",
            "product_id" => "required|exists:products,id",
            "start_date" => "required|sometimes",
            "end_date" => "required|sometimes",
        ]);
        $editDisount = discount::find($request->idDiscount);
        $priceProduct = Product::where('id', $request->product_id)->select("price")->first();

        if ($request->discount == null) {
            $request->validate([
                "percentage" => "required|numeric|between:1,100",
            ]);
            $afterPrice = $priceProduct->price - ($priceProduct->price * (int)$request->percentage / 100);
        } elseif ($request->percentage == null) {
            $request->validate([
                "discount" => "required|numeric",
            ]);

            $afterPrice = $priceProduct->price - $request->discount;
            if ($afterPrice < 1) {
                $request->session()->flash('error', 'Discount greater than or equal to Product price');
                return back();
            }
        }
       
        $editDisount->update([
            "product_id" => $request->product_id,
            "startDate" => Carbon::parse($request->start_date)->timestamp,
            "endDate" => Carbon::parse($request->end_date)->timestamp,
            "discount" => json_encode([
                'percentage' => $request->percentage,
                'discount' => $request->discount
            ]),
            "afterDiscount" => $afterPrice
        ]);
        $request->session()->flash('error', 'Successed Edit Discount');
        return  redirect()->route('admin.discount.show');
        //Carbon::parse($request->from)->timestamp
        // dd($afterPrice);
    }
}
