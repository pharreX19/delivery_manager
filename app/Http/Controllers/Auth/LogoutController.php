<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Domain\LoginService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(LoginService $loginService)
    {
        if($user = $loginService->logout()){
            return response()->json([
                'success_code' => 200,
                'success_message' => 'User logged out successfully',
                'data' => $user
            ], 200);
        }
        return response()->json([
            'failure_code' => 500,
            'failure_message' => 'Unexpected Error'
        ], 500);
    }
}
