<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    final public function successResponse(array $data = null, int $code = 200, string $message = null): JsonResponse
    {
        return $this->response(
            data:    $data,
            code:    $code,
            message: $message,
        );
    }

    final public function errorResponse(int $code = 422, string $message = null): JsonResponse
    {
        return $this->response(
            success: false,
            code:    $code,
            message: $message,
        );
    }

    private function response(
        bool $success = true,
        array $data = null,
        int $code = 200,
        string $message = null
    ): JsonResponse {
        $response = [
            'success' => $success,
            'code'    => $code,
        ];

        if ($data) {
            $response = [...$response, 'data' => $data];
        }

        if ($message) {
            $response = [...$response, 'message' => $message];
        }

        return response()->json($response, $code);
    }
}
