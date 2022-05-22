<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseControlloer extends Controller
{
    /**
     * Успех =)
     *
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function sendResponse($result, int $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];
        return response()->json($response, $code);
    }

    /**
     * Возвращает ошибку.
     *
     * @param $error
     * @param $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
