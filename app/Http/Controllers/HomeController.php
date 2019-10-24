<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Brands;
use App\Models\Contacts;
use App\Models\HomeBanners;
use App\Models\News;
use App\Models\Products;
use App\Models\Types;
use App\Models\WarrantyTypes;
use App\Models\Statistics;
use App\Models\Services;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{

    public function index()
    {
        $home_banners = HomeBanners::getAll();
        $products = Products::getAll();
        $news = News::getAll();
        $statistics = Statistics::getAll();
        $services = Services::getAll();
        return view('customer.index', compact('products', 'home_banners', 'news', 'statistics', 'services'));
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
        $news = News::getAll();
        return view('customer.news', compact('news'));
    }

    public function about()
    {
        return view('customer.about');
    }

    public function warranty()
    {
        $warranty = WarrantyTypes::getAll();
        return view('customer.warranty', compact('warranty'));
    }

    public function contact()
    {
        return view('customer.contact');
    }
    public function postContact(Request $request)
    {
        $data = Contacts::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã gửi thông tin liên hệ với chúng tôi thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function newsDetail($id)
    {
        $new = News::getById($id);
        return view('customer.news-detail', compact('new'));
    }

    public function productDetail($id)
    {
        $product = Products::getProductId($id);
        $get5prods = Products::get5Prods($product->brand_id, $product->type_id);
        return view('customer.product-detail', compact('product', 'get5prods'));
    }
    public function postPriceProducts(Request $request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $cuacuon_id = $request->cuacuon_id == null ? null : $request->cuacuon_id;
            $motor_id = $request->motor_id == null ? null : $request->motor_id;
            $binhluudien_id = $request->binhluudien_id == null ? null : $request->binhluudien_id;
            $phukien_id = $request->phukien_id == null ? null : $request->phukien_id;

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
            if ($request->cuacuon_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->cuacuon_id,
                    'quantity' => $request->quantity_cuacuon_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($request->motor_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->motor_id,
                    'quantity' => $request->quantity_motor_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($request->binhluudien_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->binhluudien_id,
                    'quantity' => $request->quantity_binhluudien_id,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
            if ($request->phukien_id) {
                DB::table('detail_quotation')->insert([
                    'quotation_id' => $quotation_id,
                    'product_id' => $request->phukien_id,
                    'quantity' => $request->quantity_phukien_id,
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
        $choose_product='';
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
            $choose_product="<button type='button' class='build-product btn-choose-product' onclick='openChooseProductPopup(this, 4)'>Chọn sản phẩm</button>";
        }

        
        $output .= "<div class='item-image w20'>
        <a href='#'>
        <img src='$data->image_link'>
        </a>
        $choose_product
        </div>
        <div class='item-info-2 w40'>
        <div class='name added-name'>
        <a href='#'>
        " . $data->name . "
        </a>
        
        </div>
        <input type='hidden' name='$type_id' id='$type_id' value='$data->id'>
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
    public function filterProduct(Request $request)
    {
        $selected = array_count_values($request->selected);
        foreach($selected as $k){
            i;
        }
        return $selected;
        // $output = '';
        // $output .= '
        // <div class="grid__item large--one-quarter medium--one-third small--one-first md-pd-left15">
        //     <div class="product-item">
        //         <div class="product-img">
        //             <a href="chi-tiet-san-pham/{{$k->id}}">
        //                 <img id="1016170018" height="300" src="{{$k->image_link}}" alt="Máy Lọc Nước Treo Tường Rewa RW-NA-50PB1">
        //             </a>
        //             <!-- <div class="tag-saleoff text-center">
        //                 -30%
        //             </div> -->
        //             <div class="product-actions text-center clearfix">
        //                 <div>
        //                     <!--
        //                     <button type="button" class="medium--hide small--hide"><a
        //                             style="color: white" href="lien-he">Nhận tư
        //                             vấn</a></button> -->
        //                     <!-- <button type="button" class="medium--hide small--hide"><a style=" color: white" href="bao-gia">Báo
        //                             giá</a></butt
        //                 </div>
        //             </div>

        //         <div class="product-item-info text-center">
        //             <div class="product-title">
        //                 <a href="/chi-tiet-san-pham/{{$k->id}}">
        //                     {{$k->name}}</a>
        //             </div>
        //             <!-- <div class="product-price clearfix">
        //                 <span class="current-price">{{number_format($k->price)}} đ</span>
        //             </div> -->
        //         </div>
        //     </div>
        // </div>';
        // $output .=$counts;
        // echo $selected;
    }
    public function export()
    {
        return Excel::download(new ProductsExport(), 'don-hang.xlsx');
    }
}
