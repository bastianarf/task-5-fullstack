<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data, $msg = null, $status = 200)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $msg,
            'status' => $status,
        ];

        return response()->json($response, $status);
    }

    public function error($errorMsg, $errorData = [], $status = 500)
    {
        $response = [
            'success' => false,
            'message' => $errorMsg,
        ];

        if(! empty($errorData)) {
            $response['data'] = $errorData;
        }

        $response['status'] = $status;

        return response()->json($response, $status);
    }
}
