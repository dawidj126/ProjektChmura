<?php
namespace App\Http\Controllers\Api\Public;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
class BlogCategoryController extends ApiController {
    public function index(): JsonResponse { return $this->success([]); }
}
