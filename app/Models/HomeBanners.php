<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Image;

class HomeBanners extends Model
{
    public static function getAll()
    {
        $data = DB::table('home_banners')->orderBy('id', 'desc')->get();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = DB::table('home_banners')->insertGetId([
            'main_title' => $data->main_title,
            'sub_title' => $data->sub_title,
            'button_link' => $data->button_link,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($data->hasFile('image_link')) {
            //filename to store
            $filenametostore = $id . '_home_banners.png';
            //Upload File
            $data->file('image_link')->storeAs('public/home_banners', $filenametostore);
            $data->file('image_link')->storeAs('public/home_banners/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/home_banners/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('home_banners')
                ->where('id', $id)
                ->update([
                    'image_link' => '/storage/home_banners/' . $filenametostore,
                ]);
        }
        return 200;
    }
    public static function postEdit($data)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            DB::table('home_banners')
                ->where('id', $data->id)
                ->update([
                    'main_title' => $data->main_title,
                    'sub_title' => $data->sub_title,
                    'button_link' => $data->button_link,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            if ($data->hasFile('image_link')) {
                //filename to store
                $filenametostore = $data->id . '_home_banners.png';
                //Upload File
                $data->file('image_link')->storeAs('public/home_banners', $filenametostore);
                $data->file('image_link')->storeAs('public/home_banners/thumbnail', $filenametostore);

                //Resize image here
                $thumbnailpath = public_path('storage/home_banners/thumbnail/' . $filenametostore);
                $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
                DB::table('home_banners')
                    ->where('id', $data->id)
                    ->update([
                        'image_link' => '/storage/home_banners/' . $filenametostore,
                    ]);
            }
            return 200;
        } catch (Exception $ex) {
            return $ex;
        }
    }
    public static function destroy($id)
    {
        DB::table('home_banners')
            ->where('id', $id)->delete();
        return 200;
    }
    public static function ajaxGetEdit($id)
    {
        $data =  DB::table('home_banners')
            ->where('id', $id)->first();
        return $data;
    }
}
