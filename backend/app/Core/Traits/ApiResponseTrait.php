<?php

namespace App\Core\Traits;

use App\Core\Responses\ApiResponse;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function successResponse(
        mixed $data = null,
        string $message = 'Success',
        int $status = 200
    ): JsonResponse {
        return ApiResponse::success($data, $message, $status);
    }

    protected function errorResponse(
        string $message = 'Something went wrong',
        mixed $errors = null,
        int $status = 400
    ): JsonResponse {
        return ApiResponse::error($message, $errors, $status);
    }
}
