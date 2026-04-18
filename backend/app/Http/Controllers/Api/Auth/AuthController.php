<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function register(Request $request): JsonResponse
    {
        return $this->error('Moduł rejestracji zostanie zaimplementowany w Kroku 5.', 501);
    }

    public function login(Request $request): JsonResponse
    {
        return $this->error('Moduł logowania zostanie zaimplementowany w Kroku 5.', 501);
    }

    public function logout(Request $request): JsonResponse
    {
        return $this->error('Moduł wylogowania zostanie zaimplementowany w Kroku 5.', 501);
    }

    public function me(Request $request): JsonResponse
    {
        return $this->success($request->user());
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        return $this->error('Reset hasła zostanie zaimplementowany w Kroku 5.', 501);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        return $this->error('Reset hasła zostanie zaimplementowany w Kroku 5.', 501);
    }
}
