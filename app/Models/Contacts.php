<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Request;

class Contacts extends Model
{
    public static function getAll()
    {
        $data=DB::table('contacts')->orderBy('id','desc')->get();
        return $data;
    }
    public static function edit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('contacts')
        ->where('id',$data->id)
        ->update([
            'name'=>$data->name,
            'email'=>$data->email,
            'phone'=>$data->email,
            'content'=>$data->email,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('contacts')
        ->where('id',$id)->delete();
        return 200;
    }
}
