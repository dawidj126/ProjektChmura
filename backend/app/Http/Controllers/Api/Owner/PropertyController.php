<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function store(Request $request): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 7.', 501); }
    public function show(int $id): JsonResponse { return $this->success(null); }
    public function update(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 8.', 501); }
    public function destroy(int $id): JsonResponse { return $this->noContent(); }
}
