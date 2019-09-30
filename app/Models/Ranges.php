<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ranges extends Model
{
    public static function getAll()
    {
        $data=DB::table('ranges')->orderBy('id','desc')->get();
        return $data;
    }
    public static function getAll_Compatibility()
    {
        $data=DB::table('compatibility')->get();
        return $data;
    }
    public static function getInProduct()
    {
        $data=DB::table('ranges as r')
        ->join('compatibility as c', 'c.range_id', '=', 'r.id')
        ->join('products as p', 'c.product_id', '=', 'p.id')
        ->select('r.size_name','c.product_id')->distinct('c.product_id')->get();
        return $data;
    }
    public static function findProductID($id)
    {
        $data=DB::table('ranges as r')
        ->join('compatibility as c', 'c.range_id', '=', 'r.id')
        ->join('products as p', 'c.product_id', '=', 'p.id')
        ->select('r.id as range_id')->where('c.product_id',$id)->get();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('ranges')->insert([
            'size_name'=>$data->size_name,
            'size'=>$data->size,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('ranges')
        ->where('id',$data->id)
        ->update([
            'size_name'=>$data->size_name,
            'size'=>$data->size,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('ranges')
        ->where('id',$id)->delete();
        return 200;
    }
}
