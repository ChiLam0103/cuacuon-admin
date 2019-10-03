<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Types;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
class HomeController extends Controller
{

    public function index()
    {
        $products = Products::getAll();
        return view('customer.index', compact('products'));
    }

    public function products()
    {
        $brands = Brands::getAll();
        $products = Products::getAll();
        $types = Types::getAll();
        return view('customer.products', compact('products', 'brands', 'types'));
    }
    public function priceProducts()
    {
        $products_cuacuon = Products::get_CuaCuon();
        $products_motor = Products::get_MoTor();
        $products_binhluudien = Products::get_BinhLuuDien();
        $products_phukien = Products::get_PhuKien();
        $types = Types::getAll();
        $brands = Brands::getAll();
        return view('customer.price_product', compact('products_cuacuon', 'products_motor', 'products_binhluudien', 'products_phukien', 'types', 'brands'));
    }
    public function news()
    {
        return view('customer.news');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function warranty()
    {
        return view('customer.warranty');
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function newsDetail()
    {
        return view('customer.news-detail');
    }

    public function productDetail($id)
    {
        $product = Products::getProductId($id);
        return view('customer.product-detail', compact('product'));
        $products = Products::getProductId($id);
        return view('customer.product-detail', compact('products', 'brands', 'types'));
    }
    public function postPriceProducts(Request $request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $contact_id = DB::table('contacts')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'content' => $request->content,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $quotation_id = DB::table('price_quotation')->insertGetId([
                'contact_id' => $contact_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if($request->cuacuon_id){
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->cuacuon_id,
                    'quantity'=>$request->quantity_cuacuon_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if($request->motor_id){
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->motor_id,
                    'quantity'=>$request->quantity_motor_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if($request->binhluudien_id){
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->binhluudien_id,
                    'quantity'=>$request->quantity_binhluudien_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if($request->phukien_id){
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->phukien_id,
                    'quantity'=>$request->quantity_phukien_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            return redirect()->back()->with('success', 'Bạn đã gửi thông tin tư vấn cho chúng tôi thành công');
        } catch (Exception $ex) {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }


    //ajax
    public function getProduct(Request $request)
    {
        $type_id = 'cuacuon_id';
        $output = '';
        $data = DB::table('products as p')
            ->leftJoin('compatibility as c', 'c.product_id', '=', 'p.id')
            ->leftJoin('ranges as r', 'c.range_id', '=', 'r.id')
            ->where('p.id', $request->id)
            ->select('p.*', 'r.size')
            ->first();
        if ($data->type_id == 1) {
            $type_id = 'cuacuon_id';
        } else if ($data->type_id == 2) {
            $type_id = 'motor_id';
        } else if ($data->type_id == 3) {
            $type_id = 'binhluudien_id';
        } else if ($data->type_id == 4) {
            $type_id = 'phukien_id';
        }
        $output .= "<div class='item-image w20'>
        <a href='#'>
        <img src='$data->image_link'>
        </a>
        </div>
        <div class='item-info-2 w40'>
        <div class='name added-name'>
        <a href='#'>
        " . $data->name . "
        </a>
        </div>
        <div class='price added-price'>" . number_format($data->price) . "đ</div>
        <div class='quantity added-quantity'>
        <button type='button' class='sub-quantity' onclick='sub(this," . $data->type_id . "," . $data->size . ")'>-</button>
        <input type='hidden' name='$type_id' value='$data->id'>
        <input type='number' id='number' name='quantity_$type_id' class='choose-item-quantity' value='1' onkeyup='checkNumber(this," . $data->type_id . "," . $data->size . ")' onfocusout='checkNumber(this," . $data->type_id . "," . $data->size . ")'>
        <button type='button' class='add-quantity' onclick='add(this," . $data->type_id . "," . $data->size . ")'>+</button>
        </div>
        </div>
        <div class='item-total-price w20'>
        " . number_format($data->price) . "đ
        </div>
        <div class='item-button w20'>
        <button type='button' class='remove-cart' data-parent='$data->id' onclick='removeCart(this, $data->type_id)'>
        <i class='fa fa-trash'></i>
        </button>
        </div>";
        echo $output;
    }
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
