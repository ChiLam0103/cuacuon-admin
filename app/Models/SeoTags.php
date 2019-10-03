<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeoTags extends Model
{
    public static function getAll()
    {
        $data = DB::table('seo_tags')->orderBy('id', 'desc')->get();
        return $data;
    }

    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('seo_tags')->insert([
            'meta_tag' => $data->meta_tag,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('seo_tags')
            ->where('id', $data->id)
            ->update([
                'meta_tag' => $data->meta_tag,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('seo_tags')
            ->where('id', $id)->delete();
        return 200;
    }
}