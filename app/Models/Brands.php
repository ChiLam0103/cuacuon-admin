<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Request;

class Brands extends Model
{
    public static function getAll()
    {
        $brands=DB::table('brands')->orderBy('id','desc')->get();
        return $brands;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $brands=DB::table('brands')->insert([
            'name'=>$data->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        dd(123);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $brands=DB::table('brands')
        ->where('id',$data->id)
        ->update([
            'name'=>$data->name,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
}
