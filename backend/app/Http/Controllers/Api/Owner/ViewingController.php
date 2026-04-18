<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViewingController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function updateStatus(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 16.', 501); }
}
