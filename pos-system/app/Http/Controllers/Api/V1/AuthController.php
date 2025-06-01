<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Logics\AuthLogic;
use Log;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $res = AuthLogic::login($request);
        return apiResponse($res['msg'], $res['code'], $res['data']);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return apiResponse(__('register.success'), 200, []);
    }
}
