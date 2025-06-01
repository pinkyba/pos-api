<?php

namespace App\Logics;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Log;

class AuthLogic
{
    public static function login($request) {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return ['code' => 401, 'msg'=> __('register.invalid_credentials'), 'data' => []];
        }
        
        $user = Auth::user();
        $token = $user->createToken('pos-token')->plainTextToken;
        return ['code' => 200, 'msg'=> __('register.success'), 'data' => ['token' => $token]];
    }
}