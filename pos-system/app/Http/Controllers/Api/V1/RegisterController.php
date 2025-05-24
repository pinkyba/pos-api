<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Logics\RegisterLogic;
use Log;

class RegisterController extends Controller
{
    public function doRegister(RegisterRequest $request) {
        $res = RegisterLogic::register($request);
        return apiResponse($res['msg'], $res['code'], $res['data']);
    }
}
