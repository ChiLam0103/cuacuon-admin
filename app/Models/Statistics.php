<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistics extends Model
{
    public static function getAll()
    {
        $data = DB::table('statistics')->orderBy('id', 'desc')->get();
        return $data;
    }

    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('statistics')->insert([
            'number' => $data->number,
            'value' => $data->value,
            'content' => $data->content,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('statistics')
            ->where('id', $data->id)
            ->update([
                'number' => $data->number,
                'value' => $data->value,
                'content' => $data->content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('statistics')
            ->where('id', $id)->delete();
        return 200;
    }
}
