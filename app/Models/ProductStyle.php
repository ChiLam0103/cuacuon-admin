<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductStyle extends Model
{
    public static function getAll()
    {
        $data = DB::table('product_style')->orderBy('id', 'desc')->get();
        return $data;
    }
    public static function getByType($id)
    {
        $data = DB::table('product_style as ps')->rightJoin('products as p','p.style_id','=','ps.id')->where('p.type_id', $id)->select('ps.*')->distinct()->get();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('product_style')->insert([
            'name' => $data->meta_tag,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('product_style')
            ->where('id', $data->id)
            ->update([
                'name' => $data->meta_tag,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('product_style')
            ->where('id', $id)->delete();
        return 200;
    }
}