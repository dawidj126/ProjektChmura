<?php
namespace App\Http\Controllers\Api\Public;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
class PageController extends ApiController {
    public function show(string $slug): JsonResponse { return $this->success(null); }
}
