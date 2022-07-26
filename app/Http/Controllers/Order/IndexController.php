<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Tools\Curl\Curl;
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


    public function listWithUser()
    {
        $orders = [
            ["id"=>1,"pay_type"=>"微信支付","user_id"=>1,"money"=>1000,"status"=>"等待发货"],
            ["id"=>2,"pay_type"=>"微信支付","user_id"=>2,"money"=>2000,"status"=>"等待收货"],

        ];

        $url = config('custom.env.USER_URL') . "/api/user/list";

        $users = Curl::httpPost( $url );

        return $this->apiResponse( [
            'orders' => $orders,
            'users' => $users,
        ] );
    }


    public function detail()
    {
        $arr = ["id"=>2,"pay_type"=>"微信支付","user_id"=>2,"money"=>2000,"status"=>"等待收货"];

        return $this->apiResponse( $arr );
        
    }
    
    public function detailWithUser()
    {
        $order = ["id"=>2,"pay_type"=>"微信支付","user_id"=>2,"money"=>2000,"status"=>"等待收货"];

        $url = config('custom.env.USER_URL') . "/api/user/detail";
        $user = Curl::httpPost( $url );


        return $this->apiResponse( [
            'order' => $order,
            'user' => $user,
        ] );
        
    }

}
