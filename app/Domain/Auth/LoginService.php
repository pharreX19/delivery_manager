<?php

namespace App\Http\Domain;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginService{

    use ThrottlesLogins;

    public function execute(LoginRequest $request)
    {

        $credentials = $request->only(['name', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return false;
        }
        
        $user = $this->setToken($token);
        return $user;
        // return true;
        // return $this->respondWithToken($token);
    }

    private function setToken($token){
        $user = $this->getUser();
        $user->token = $token;
        $user->save();
        return $user;
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        $user = $this->getUser();
        $user->token = null;
        $user->save();
        return $user;
        // Auth::logout();
        // return response()->json(['message' => 'Successfully logged out']);
    }

    private function getUser(){
        return User::find(Auth::user()->id);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}