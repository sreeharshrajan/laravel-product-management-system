<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'status' => $this->getCode() ?: 400,
        ], $this->getCode() ?: 400);
    }
}
