<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    /**
     * Build success response
     * @param string|array $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, $message = "", $code = Response::HTTP_OK)
    {
        return response()->json([
            'error' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Build error responses
     * @param string|array $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json([
            'error' => true,
            'message' => $message
        ], $code);
    }
}
