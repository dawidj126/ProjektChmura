<?php

namespace App\Http\Controllers\Api\Shared;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConversationController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function store(Request $request): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 14.', 501); }
    public function show(int $id): JsonResponse { return $this->success(null); }
}
