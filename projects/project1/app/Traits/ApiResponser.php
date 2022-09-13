<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    protected function successResponse($data, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code, [], JSON_NUMERIC_CHECK);
    }

    protected function errorResponse($message = null, $code = 412, $detail = null): JsonResponse
    {
        $response = [
            'status' => 'error',
            'message' => $message,
            'detail' => $detail,
        ];
        return response()->json($response, $code, [], JSON_NUMERIC_CHECK);
    }

    protected function warningResponse($message = null, $code = 422, $detail = null): JsonResponse
    {
        $response = [
            'status' => 'warning',
            'message' => $message,
            'detail' => $detail,
        ];
        return response()->json($response, $code, [], JSON_NUMERIC_CHECK);
    }
}
