<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brands extends Model
{
    public static function getAll()
    {
        $data = DB::table('brands')->orderBy('id', 'desc')->get();
        return $data;
    }

    public static function getByType($id)
    {
        $data = DB::table('brands')->where('type_id', $id)->orderBy('id', 'desc')->get();
        return $data;
    }

    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('brands')->insert([
            'name' => $data->name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('brands')
            ->where('id', $data->id)
            ->update([
                'name' => $data->name,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('brands')
            ->where('id', $id)->delete();
        return 200;
    }
}