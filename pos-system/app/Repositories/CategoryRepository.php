<?php

namespace App\Repositories;
use App\Models\Category;

class CategoryRepository
{
    protected function model()
    {
        return Category::class;
    }

    public static function getRow($map = [] ,$field = '*'){
        return Category::query()->where($map)->first($field);
    }

    public static function getAll($map = [] ,$field = '*'){
        return Category::where($map)->select($field)->get();
    }
}