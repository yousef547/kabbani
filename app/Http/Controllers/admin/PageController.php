<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\MainCategory;
use App\Models\Category;
use App\Models\SubCategory;

class PageController extends Controller
{
    public function index(){
    
        return view('uploadFile');
    
    }
    
    public function uploadFile(Request $request){

        $request->validate([
            'file'=>'mimes:csv,txt', 
        ]);

        $file = file($request->file->getRealPath()); // جلب كل بيانات الجدول
        
        $data = array_slice($file,1); // الغاء السطر الأول فى الجدول (رأس الجدول)
        
        $parts = (array_chunk($data,1000)); // تقسيم بيانات الجدول إلى أجزاء كل 1000 سطر فى جزء
        
        foreach ($parts as $index=>$part) {     // عمل تكرار على الملف لو حجمه اكبر من 1000 سطر وتقسيمة إلى مجموعات ملفات
        
            $filename = resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv'); // تخزين الملفات المقسمة من النوع csv ونخزينها فى resource
        
            file_put_contents($filename , $part); // وضع محتويات الملف عن طريق اسم الملف وأجزاء الملف 
        }

        session()->flash('status','queued for importing');

        $path = resource_path('pending-files/*.csv'); // تحديد مكان الملفات وكلها من نوع الـ csv

        $files = glob($path); // الاتيان بكل الملفات الموجودة فى الـ path
        
        foreach ($files as $file) { // عمل تكرار على مجموعة الملفات وادخال ملف ملف 
        
            $data = array_map('str_getcsv',file($file));

            $mainCategories = MainCategory::get();
            $categories = Category::get();
            $subCategories = SubCategory::get();
            $sellers = Seller::get();

            foreach($data as $importData) {

                foreach($mainCategories as $mainCategory)
                {
                    if($importData[2] == $mainCategory->name)
                    $importData[2] = "$mainCategory->id";
                }
                foreach($sellers as $seller)
                {
                    if($importData[3] == $seller->seller_name)
                    $importData[3] = "$seller->id";
                }
                    // $importData[1] = $seller->main_category_id;
                foreach($categories as $category)
                {
                    if($importData[4] == $category->category_name)            
                    $importData[4] = "$category->id";
                }
                foreach($subCategories as $subCategory)
                {
                    if ($importData[5] == $subCategory->sub_category_name)
                    $importData[5] = "$subCategory->id";
                }
               
                // dd($importData);     
                Page::updateOrCreate([ 
                    "product_name"=>$importData[0],
                    "name_ar"=>$importData[1],
                    "main_category_id"=>$importData[2],
                    "seller_id"=>$importData[3],
                    "category_id"=>$importData[4],
                    "sub_category_id"=>$importData[5],
                    "quant"=>$importData[6],
                    "min_quant"=>$importData[7],
                    "price"=>$importData[8],
                    "compare_price"=>$importData[9],
                    'deliv_time'=>$importData[10],
                    'deliv_free'=>$importData[11],
                    "photo"=>$importData[12],
                    "deals"=>$importData[13],
                    "deals_price"=>$importData[14],
                    "allTags"=>$importData[15],
                    "description"=>$importData[16],
                    "description_ar"=>$importData[17],
                    "warranty"=>$importData[18],
                    "warranty_ar"=>$importData[19],
                    "varient_title"=>$importData[20],
                    "varient_list"=>$importData[21],
                    "related_products"=>$importData[22],
                    "recommended_products"=>$importData[23],
                    "shopify_id"=>$importData[24],
                    "variant_id"=>$importData[25],
                    "sku"=>$importData[26],
                ]);        
            }
    }                               
            

        return redirect()->route('admin.products')->with(['success'=>'The Products has been saved successfully']);

    }



}
