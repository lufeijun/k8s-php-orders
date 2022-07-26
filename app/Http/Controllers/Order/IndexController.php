<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function list()
    {
        $arr = [
            ["id"=>1,"pay_type"=>"微信支付","user_id"=>1,"money"=>1000,"status"=>"等待发货"],
            ["id"=>2,"pay_type"=>"微信支付","user_id"=>2,"money"=>2000,"status"=>"等待收货"],

        ];

        return $this->apiResponse( $arr );
    }


    public function detail()
    {
        $arr = ["id"=>2,"pay_type"=>"微信支付","user_id"=>2,"money"=>2000,"status"=>"等待收货"];

        return $this->apiResponse( $arr );
        
    }

}
