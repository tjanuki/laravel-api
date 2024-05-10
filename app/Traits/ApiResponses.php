<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    protected function ok($message, $data): JsonResponse
    {
        return $this->success($message, $data);
    }

    protected function success($message, $data, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => 'success'
        ], $statusCode);
    }

    protected function error($message, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => 'success'
        ], $statusCode);
    }
}
