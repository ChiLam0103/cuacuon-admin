<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quotations extends Model
{
    public static function getAll()
    {
        $data=DB::table('price_quotation as pq')
        ->join('contacts as c','c.id','=','pq.contact_id')
        ->join('detail_quotation as dq','pq.id','=','dq.quotation_id')
        //->join('products as p','p.id','=','dq.product_id')
        ->select('pq.id as pq_id','c.*')
        ->orderBy('pq.id','desc')->distinct()->get();
        return $data;
    }
    public static function getInfo($id)
    {
        $data=DB::table('price_quotation as pq')
        ->join('contacts as c','c.id','=','pq.contact_id')
        ->select('pq.id as pq_id','c.*')
        ->where('pq.id',$id)
        ->orderBy('pq.id','desc')->get();
        return $data;
    }
    public static function getProduct($id)
    {
        $data=DB::table('price_quotation as pq')
        ->join('contacts as c','c.id','=','pq.contact_id')
        ->join('detail_quotation as dq','pq.id','=','dq.quotation_id')
        ->join('products as p','p.id','=','dq.product_id')
        ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
        ->leftJoin('types as t', 't.id', '=', 'p.type_id')
        ->select('dq.quantity','dq.width','dq.height','p.*', 'b.name as brand_name', 't.name as type_name')
        ->where('pq.id',$id)
        ->orderBy('pq.id','desc')->get();
        return $data;
    }
}
