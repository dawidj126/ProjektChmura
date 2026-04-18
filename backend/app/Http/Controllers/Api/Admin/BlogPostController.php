<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogPostController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function store(Request $request): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 20.', 501); }
    public function show(int $id): JsonResponse { return $this->success(null); }
    public function update(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 20.', 501); }
    public function destroy(int $id): JsonResponse { return $this->noContent(); }
}
