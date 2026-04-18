<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;

class ActivityLogController extends ApiController
{
    public function index(): JsonResponse { return $this->success([]); }
}
