<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends ApiController
{
    public function update(Request $request): JsonResponse
    {
        return $this->error('Zostanie zaimplementowane w Kroku 5.', 501);
    }
}
