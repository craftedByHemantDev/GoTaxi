<?php

namespace App\Traits;

use App\Helpers\ApiResponse;

trait ApiResponseTrait
{
    protected function success($data = [], string $message = 'Success', int $status = 200)
    {
        return ApiResponse::success($data, $message, $status);
    }

    protected function error(string $message = 'Error', array $errors = [], int $status = 400)
    {
        return ApiResponse::error($message, $errors, $status);
    }
}
