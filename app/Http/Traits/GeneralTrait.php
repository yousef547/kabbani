<?php

namespace App\Http\Traits;

trait GeneralTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($errNum , $msg)
    {
        return response()->json([
            'Status'=>false,
            'Error'=>$errNum,
            'Message'=>$msg
        ]);
    }

    public function returnSuccess($successNum , $msg)
    {
        return response()->json([
            'Status'=>true,
            'Success'=>$successNum,
            'Message'=>$msg
        ]);
    }

    public function returnData($key , $val , $successNum , $msg)
    {
        return response()->json([
            'Status'=>true,
            'Success'=>$successNum,
            'Message'=>$msg,
            $key=>$val,
        ]);
    }
}

?>