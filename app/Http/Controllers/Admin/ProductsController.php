<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Types;
use App\Models\Ranges;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::getAll();
        $range_product = Ranges::getInProduct();
        return view('admin.products.index', compact('products','range_product'));
    }
    public function getCreate()
    {
        $brands = Brands::getAll();
        $types = Types::getAll();
        $ranges = Ranges::getAll();
        return view('admin.products.create', compact('brands', 'types', 'ranges'));
    }
    public function postCreate(Request $request)
    {
        $data = Products::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới sản phẩm thành công');
        } else if ($data == 201) {
            return redirect()->back()->with('fail', 'Vui vòng chọn độ tương thích!');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function getEdit($id)
    {
        $product = Products::getProductId($id);
        $range_product = Ranges::findProductID($id);
        $brands = Brands::getAll();
        $types = Types::getAll();
        $ranges = Ranges::getAll();
        $checked=0;
        return view('admin.products.edit', compact('product', 'brands', 'types', 'ranges','range_product','checked'));
    }
    public function postEdit(Request $request)
    {
        $data = Products::postEdit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa sản phẩm thành công');
        } else if ($data == 201) {
            return redirect()->back()->with('fail', 'Vui vòng chọn độ tương thích!');
        }  else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Products::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

}
