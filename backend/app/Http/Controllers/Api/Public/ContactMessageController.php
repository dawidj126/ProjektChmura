<?php
namespace App\Http\Controllers\Api\Public;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ContactMessageController extends ApiController {
    public function store(Request $request): JsonResponse { return $this->error('Zostanie zaimplementowane w Kroku 15.', 501); }
}
