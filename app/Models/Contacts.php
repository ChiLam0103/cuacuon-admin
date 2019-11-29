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
            'phone'=>$data->phone,
            'content'=>$data->content,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function create($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        DB::table('contacts')
        ->insert([
            'name'=>$data->name,
            'email'=>$data->email,
            'phone'=>$data->phone,
            'content'=>$data->content,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return 200;
    }
    public static function destroy($id)
    {
        DB::table('contacts')
        ->where('id',$id)->delete();
        return 200;
    }
    public static function saveInfoCustomer($data)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $cuacuon_id = $data->cuacuon_id == null ? null : $data->cuacuon_id;
            $motor_id = $data->motor_id == null ? null : $data->motor_id;
            $binhluudien_id = $data->binhluudien_id == null ? null : $data->binhluudien_id;
            $phukien_id = $data->phukien_id == null ? null : $data->phukien_id;

            $contact_id = DB::table('contacts')->insertGetId([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $quotation_id = DB::table('price_quotation')->insertGetId([
                'contact_id' => $contact_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if ($cuacuon_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $cuacuon_id,
                    'width' => $data->width,
                    'height' => $data->height,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($motor_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $data->motor_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($binhluudien_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $binhluudien_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($phukien_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $phukien_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            return 200;
        } catch (Exception $ex) {
            return 201;
        }
    }
}
