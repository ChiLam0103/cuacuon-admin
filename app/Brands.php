<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Request;

class Brands extends Model
{
    public static function all()
    {
        dd(123);
        $brands=DB::table('brands')->get();
        return $brands;
    }
}
