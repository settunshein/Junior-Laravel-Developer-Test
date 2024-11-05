<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($data = [], $message = '', $status_code = 200)
    {
        return response()->json([
            'status'  => 'Success',
            'data'    => $data,
            'message' => $message,
        ], $status_code);
    }

    public static function error($errors = [], $message = '', $status_code = 500)
    {
        return response()->json([
            'status'  => 'Error',
            'errors'  => $errors,
            'message' => $message,
        ], $status_code);
    }
}
