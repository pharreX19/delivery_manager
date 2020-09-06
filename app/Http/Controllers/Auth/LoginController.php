<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Domain\LoginService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $loginRequest, LoginService $loginService)
    {
        if($loginService->execute($loginRequest)){
            return response()->json([
                'access_token' => Auth::user(),
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ], 200);
        }
        return response()->json([
            'failure_code' => 302,
            'failure_message' => 'Login Failed'
        ], 301);
    }
}
