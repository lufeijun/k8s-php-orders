<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiResponse($data = null, $status = 0, $message = 'success')
    {
        if (is_null($data)) {
            $data = new \StdClass;
        }

        $returnArray = ['status' => $status, 'message' => $message, 'values' => $data];
        return response()->json($returnArray, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function apiResponseResult($msg = '', $data = null)
    {
        if ($msg) {
            return $this->apiResponse($data, 1, $msg);
        } else {
            return $this->apiResponse($data);
        }
    }
}
