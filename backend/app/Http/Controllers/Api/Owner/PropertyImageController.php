<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PropertyImageController extends ApiController
{
    public function store(Request $request, int $id): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 9.', 501); }
    public function setMain(int $id, int $imageId): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 9.', 501); }
    public function destroy(int $id, int $imageId): JsonResponse { return $this->noContent(); }
}
