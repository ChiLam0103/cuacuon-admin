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
use PHPExcel_Worksheet_Drawing;

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
        return view('customer.price_product', compact('products_cuacuon', 'products_motor', 'products_binhluudien', 'products_phukien', 'types'));
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


    //ajax
    public function getProduct(Request $request)
    {
        $type_id = 'cuacuon_id';
        $output = '';
        $choose_product = '';
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
            $choose_product = "<button type='button' class='build-product btn-choose-product' onclick='openChooseProductPopup(this, 4)'>Chọn sản phẩm</button>";
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

    public function exportExcel(Request $request)
    {
        // dd($request);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $infoCustomer = $request;
        $listResult = DB::table('products as p')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->leftJoin('types as t', 't.id', '=', 'p.type_id')
            ->leftJoin('product_style as ps', 'ps.id', '=', 'p.style_id')
            ->where(function ($query) use ($request) {
                $query->where('p.id', '=', $request->cuacuon_id)
                    ->orWhere('p.id', '=',   $request->motor_id)
                    ->orWhere('p.id', '=',   $request->binhluudien_id)
                    ->orWhere('p.id', '=',   $request->phukien_id);
            })
            ->select('p.id', 'p.name', 'p.price', 'b.name as brand_name', 't.name as type_name', 'ps.name as style_name')
            ->get();
        //  dd(number_format($listResult->sum('price')));
        Contacts::saveInfoCustomer($request);
        return Excel::create('bao-gia', function ($excel) use ($listResult, $date, $infoCustomer) {
            $excel->sheet('báo giá', function ($sheet) use ($listResult, $date, $infoCustomer) {
                $objDrawing = new PHPExcel_Worksheet_Drawing;
                $objDrawing->setPath(public_path('customer/img/logo.png')); //your image path
                $objDrawing->setCoordinates('A1');
                $objDrawing->setHeight(50); // Thiết lập chiều cao hình ảnh
                $objDrawing->setWorksheet($sheet);
                $sheet->loadView('customer.debt', [
                    'listResult' => $listResult,
                    'date' => $date,
                    'infoCustomer' => $infoCustomer
                ]);
                $sheet->setOrientation('landscape');
            });
        })->download('xlsx');
    }
    public function receiveAdvice(Request $request)
    {
        try {
            Contacts::saveInfoCustomer($request);
            return redirect()->back()->with('success', 'Bạn đã gửi thông tin tư vấn cho chúng tôi thành công');
        } catch (Exception $ex) {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

}
