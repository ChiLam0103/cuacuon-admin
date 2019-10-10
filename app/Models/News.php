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
    public static function getById($id){
        $data = DB::table('news as n')->join('new_types as nt', 'nt.id', '=', 'n.new_type')->where('n.id',$id)->select('n.*', 'nt.name as new_type_name')->first();
        return $data;
    }
    public static function postCreate($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id= DB::table('news')->insertGetId([
            'title' => $data->title,
            'sub_content' => $data->sub_content,
            'content' => $data->content,
            'new_type' => $data->new_type,
            'created_by' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($data->hasFile('new_image')) {
            //filename to store
            $filenametostore = $id . '_new.png';
            //Upload File
            $data->file('new_image')->storeAs('public/news', $filenametostore);
            $data->file('new_image')->storeAs('public/news/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/news/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('news')
                ->where('id', $id)
                ->update([
                    'image_link' => 'public/storage/news/' . $filenametostore,
                ]);
        }
        return 200;
    }
    public static function postEdit($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('news')
            ->where('id', $data->id)
            ->update([
                'title' => $data->title,
                'sub_content' => $data->sub_content,
                'content' => $data->content,
                'new_type' => (int)$data->new_type,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        if ($data->hasFile('new_image')) {
            //filename to store
            $filenametostore = $data->id . '_new.png';
            //Upload File
            $data->file('new_image')->storeAs('public/new', $filenametostore);
            $data->file('new_image')->storeAs('public/new/thumbnail', $filenametostore);
            //Resize image here
            $thumbnailpath = public_path('storage/new/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('news')
                ->where('id', $data->id)
                ->update([
                    'image_link' => 'public/storage/new/' . $filenametostore,
                ]);
        }    
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
