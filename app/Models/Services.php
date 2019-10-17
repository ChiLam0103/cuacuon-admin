<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;

class Services extends Model
{
    public static function getAll()
    {
        $data = DB::table('services')->orderBy('id', 'desc')->get();
        return $data;
    }
    public static function getById($id){
        $data = DB::table('services')->where('id',$id)->first();
        return $data;
    }
    public static function postCreate($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id= DB::table('services')->insertGetId([
            'title' => $data->title,
            'content' => $data->content,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($data->hasFile('image')) {
            //filename to store
            $filenametostore = $id . '_service.png';
            //Upload File
            $data->file('image')->storeAs('public/services', $filenametostore);
            $data->file('image')->storeAs('public/services/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/services/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('services')
                ->where('id', $id)
                ->update([
                    'image_link' => 'public/storage/services/' . $filenametostore,
                ]);
        }
        return 200;
    }
    public static function postEdit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('services')
            ->where('id', $data->id)
            ->update([
                'title' => $data->title,
                'content' => $data->content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        if ($data->hasFile('image')) {
            //filename to store
            $filenametostore = $data->id . '_service.png';
            //Upload File
            $data->file('image')->storeAs('public/services', $filenametostore);
            $data->file('image')->storeAs('public/services/thumbnail', $filenametostore);
            //Resize image here
            $thumbnailpath = public_path('storage/services/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('services')
                ->where('id', $data->id)
                ->update([
                    'image_link' => 'public/storage/services/' . $filenametostore,
                ]);
        }    
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('services')
            ->where('id', $id)->delete();
        return 200;
    }
    public static function find($id)
    {
        $data =  DB::table('services')
            ->where('id', $id)->first();
        return $data;
    }
}
