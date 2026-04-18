<?php
namespace App\Http\Controllers\Api\Public;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class BlogPostController extends ApiController {
    public function index(Request $request): JsonResponse { return $this->success([]); }
    public function show(string $slug): JsonResponse { return $this->success(null); }
}
