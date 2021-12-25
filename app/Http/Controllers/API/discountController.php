<?php

namespace App\Http\Controllers\API;

use App\discount;
use App\Http\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class discountController extends Controller
{
    use GeneralTrait;
    public function getDiscount()
    {
        $allDiscount = discount::join("products", "product_id", "products.id")
            ->select("products.product_name", "products.name_ar", "products.id", "products.price", "products.photo", "discounts.*")
            ->get();
        $ldate = Carbon::now('Africa/Cairo');
        $fdate = Carbon::parse($ldate)->format('H:i:s');
        $hours = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('H');
        $munits = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('i');
        $second = Carbon::parse(strtotime('24:00:00') - strtotime($fdate))->format('s');
        $arrs = [];



        for ($i = 0; $i < count($allDiscount); $i++) {
            $fdate = \Carbon\Carbon::parse((int)$allDiscount[$i]->remaining_time)->format('y-m-d');
            $tdate = \Carbon\Carbon::parse((int)$allDiscount[$i]->endDate)->format('y-m-d');;
            $from = \Carbon\Carbon::createFromDate($fdate);
            $to = \Carbon\Carbon::createFromDate($tdate);
            $period = \Carbon\CarbonPeriod::create($from, $to);
            $remaining_day = $period->toArray();
            $discount = "";
            $typeDiscount = "";


            if ($allDiscount[$i]->discount("percentage") == null) {
                $discount = $allDiscount[$i]->discount("discount");
                $typeDiscount = "amount";
            } elseif ($allDiscount[$i]->discount("discount") == null) {
                $discount = $allDiscount[$i]->discount("percentage") . "%";
                $typeDiscount = "percantage";

            }
            $arr = [
                "id" => $allDiscount[$i]->id,
                "product_name" => $allDiscount[$i]->product_name,
                "name_ar" => $allDiscount[$i]->product_name,
                "photo" => $allDiscount[$i]->photo,
                "product_id" => $allDiscount[$i]->product_id,
                "price" => $allDiscount[$i]->price,
                "startDate" =>Carbon::parse((int)$allDiscount[$i]->startDate)->format('Y-m-d'),
                "endDate" => Carbon::parse((int)$allDiscount[$i]->endDate)->format('Y-m-d'),
                "active" => $allDiscount[$i]->active,
                "discount" => $discount,
                "typeDiscount" =>$typeDiscount,
                "remaining_day" => count($remaining_day) - 2,
                "remaining_hours" => $hours,
                "remaining_munits" => $munits,
                "remaining_second" => $second,
                "afterDiscount" => $allDiscount[$i]->afterDiscount,
                "created_at" => $allDiscount[$i]->created_at,
                "updated_at" => $allDiscount[$i]->updated_at,
            ];
            array_push($arrs, $arr);
        }


        return $this->returnData('discount', $arrs, '200', 'Success',);
    }
}
