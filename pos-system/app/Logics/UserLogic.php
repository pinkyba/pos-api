<?php

namespace App\Logics;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Repositories\UserRepository;
use Log;

class UserLogic
{
    public static function createUser($request) {
        $isExit = UserRepository::isEmailExit($request->email);
        if($isExit) {
            return ['code' => 409, 'msg'=> __('register.email_exist'), 'data' => []];
        }
        if($request->password !== $request->password_confirmation) {
            return ['code' => 422, 'msg'=> __('register.pass_not_match'), 'data' => []];
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'roles' => $request->roles,
            'status' => 1
        ];
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension(); // unique name
            $path = $file->storeAs('public/user_photos', $filename); // save to storage/app/public/user_photos
            $data['photo'] = 'storage/user_photos/' . $filename; // for public access
        }
        UserRepository::createUser($data);
        return ['code' => 200, 'msg'=> 'User has been successfully registered', 'data' => $data];
    }
}