<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Log;

class UserController extends Controller
{
    public function getInfo(Request $request) {
        $user = $request->user(); // Authenticated user
        $result = [
                'name' => $user->name,
                'roles' => $user->roles,
        ];
        Log::info('getInfo');
        return apiResponse(__('register.success'), 200, $result);
    }
    public function getUsers() {
        $users = UserRepository::getAll(['status' => 1]);
        return apiResponse(__('register.success'), 200, $users);
    }

    public function createUser() {
        
    }
}
