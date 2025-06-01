<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    protected function model()
    {
        return User::class;
    }

    public static function getRow($map = [] ,$field = '*'){
        return User::query()->where($map)->first($field);
    }

    public static function getAll($map = [] ,$field = '*'){
        return User::where($map)->select($field)->get();
    }
    /**
     * custom field
     */
    public static function getField($map = [],$field){
        return User::where($map)->value($field);
    }

    public static function getColumnByIds($ids = [],$field = []){
        return User::whereIn('id',$ids)->pluck($field);
    }

    public static function createUser(array $data){
        return User::create($data)->id;
    }

    public static function isEmailExit($email) {
        return User::where('email', $email)->exists();
    }
}