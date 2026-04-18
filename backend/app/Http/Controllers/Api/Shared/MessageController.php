<?php

namespace App\Http\Controllers\Api\Shared;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends ApiController
{
    public function store(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 14.', 501); }
    public function markRead(int $id): JsonResponse { return $this->success(null); }
}
