<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class News extends Model
{
    public static function getAll()
    {
        $data = DB::table('news as n')->join('new_types as nt', 'nt.id', '=', 'n.new_type')->select('n.*', 'nt.name as new_type_name')->get();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('news')->insert([
            'title' => $data->title,
            'content' => $data->content,
            'new_type' => $data->new_type,
            'created_by' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function postEdit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('news')
            ->where('id', $data->id)
            ->update([
                'title' => $data->title,
                'content' => $data->content,
                'new_type' => (int)$data->new_type,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('news')
            ->where('id', $id)->delete();
        return 200;
    }
    public static function find($id)
    {
        $data =  DB::table('news')
            ->where('id', $id)->first();
        return $data;
    }
}
