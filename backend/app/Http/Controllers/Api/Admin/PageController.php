<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
    public function update(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 21.', 501); }
}
