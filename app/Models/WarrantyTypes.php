<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WarrantyTypes extends Model
{
    public static function getAll()
    {
        $data=DB::table('warranty_types')->orderBy('id','desc')->get();
        return $data;
    }
    public static function getByID($id)
    {
        $data=DB::table('warranty_types')->where('id',$id)->first();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('warranty_types')->insert([
            'name'=>$data->name,
            'content'=>$data->content,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('warranty_types')
        ->where('id',$data->id)
        ->update([
            'name'=>$data->name,
            'content'=>$data->content,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('warranty_types')
        ->where('id',$id)->delete();
        return 200;
    }
}
