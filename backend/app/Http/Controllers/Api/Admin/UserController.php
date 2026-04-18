<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function show(int $id): JsonResponse { return $this->success(null); }
    public function updateStatus(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 19.', 501); }
    public function updateRole(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 19.', 501); }
}
