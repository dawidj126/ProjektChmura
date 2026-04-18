<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function updateStatus(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 19.', 501); }
}
