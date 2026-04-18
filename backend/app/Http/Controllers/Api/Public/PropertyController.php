<?php
namespace App\Http\Controllers\Api\Public;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PropertyController extends ApiController {
    public function index(Request $request): JsonResponse { return $this->success([], 'Lista ofert — zostanie zaimplementowana w Kroku 10.'); }
    public function show(string $slug): JsonResponse { return $this->success(null, 'Szczegóły oferty — zostanie zaimplementowane w Kroku 12.'); }
}
