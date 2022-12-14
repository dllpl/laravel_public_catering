<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Трейт ответов от api методов.
 */
trait ApiControllerTrait
{
    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function apiResponseError(string $message = '', int $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function apiResponseSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
