<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Image;

class Products extends Model
{
    public static function getAll()
    {
        $data = DB::table('products as p')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->leftJoin('types as t', 't.id', '=', 'p.type_id')
            ->orderBy('id', 'desc')
            ->select('p.*', 'b.name as brand_name', 't.name as type_name')
            ->get();
        return $data;
    }
    public static function getProductId($id)
    {
        $data = DB::table('products as p')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->leftJoin('types as t', 't.id', '=', 'p.type_id')
            ->orderBy('id', 'desc')
            ->where('p.id', $id)
            ->select('p.*', 'b.name as brand_name', 't.name as type_name')
            ->first();
        return $data;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = DB::table('products')->insertGetId([
            'name' => $data->name,
            'price' => $data->price,
            'description' => $data->description,
            'short_description' => $data->short_description,
            'brand_id' => $data->brand_id,
            'type_id' => $data->type_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($data->type_id == 1 || $data->type_id == 2) {
            if ($data->range_id==null) {
                return 201;
            } else {
                foreach ($data->range_id as $r) {
                    DB::table('compatibility')->insert([
                        'product_id' => $id,
                        'range_id' => $r,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
        if ($data->hasFile('product_image')) {
            //filename to store
            $filenametostore = $id . '_product.png';
            //Upload File
            $data->file('product_image')->storeAs('public/product', $filenametostore);
            $data->file('product_image')->storeAs('public/product/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/product/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'image_link' => '/storage/product/' . $filenametostore,
                ]);
        }
        return 200;
    }
    public static function postEdit($data)
    {
        dd($data);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('products')
            ->where('id', $data->id)
            ->update([
                'name' => $data->name,
                'price' => $data->price,
                'short_description' => $data->short_description,
                'description' => $data->description,
                'brand_id' => $data->brand_id,
                'type_id' => $data->type_id,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        DB::table('compatibility')
            ->where('product_id', $data->id)->delete();
        if ($data->type_id == 1 || $data->type_id == 2) {
            if ($data->range_id) {
                return 201;
            } else {
                foreach ($data->range_id as $r) {
                    DB::table('compatibility')->insert([
                        'product_id' => $data->id,
                        'range_id' => $r,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
        }
        if ($data->hasFile('product_image')) {
            //filename to store
            $filenametostore = $data->id . '_product.png';
            //Upload File
            $data->file('product_image')->storeAs('public/product', $filenametostore);
            $data->file('product_image')->storeAs('public/product/thumbnail', $filenametostore);
            //Resize image here
            $thumbnailpath = public_path('storage/product/thumbnail/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            DB::table('products')
                ->where('id', $data->id)
                ->update([
                    'image_link' => '/storage/product/' . $filenametostore,
                ]);
        }
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('products')
            ->where('id', $id)->delete();
        DB::table('compatibility')
            ->where('product_id', $id)->delete();
        return 200;
    }
    public static function ajaxGetEdit($id)
    {
        $data =  DB::table('products')
            ->where('id', $id)->first();
        return $data;
    }
}
