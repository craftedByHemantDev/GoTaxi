<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = [], string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'errors' => [],
        ], $status);
    }

    public static function error(string $message = 'Something went wrong', array $errors = [], int $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => [],
            'errors' => $errors,
        ], $status);
    }
}
