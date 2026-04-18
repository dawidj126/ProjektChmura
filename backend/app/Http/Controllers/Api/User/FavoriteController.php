<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends ApiController
{
    public function index(Request $request): JsonResponse { return $this->success([]); }
    public function store(Request $request): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 13.', 501); }
    public function destroy(int $id): JsonResponse { return $this->noContent(); }
}
