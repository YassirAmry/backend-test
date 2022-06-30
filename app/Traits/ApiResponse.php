<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * success response method.
     */
    protected function sendResponse($result, $message = null, $code = 200)
    {
    	$response = [
            'status'  => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    /**
     * return error response.
     */
    public function sendError($error, $code = 404)
    {
    	$response = [
            'status'  => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}