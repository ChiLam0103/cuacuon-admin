<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::getAll();
        $brands = Brands::getAll();
        $types = Types::getAll();
        return view('admin.products.index', compact('products','brands','types'));
    }
    public function postCreate(Request $request)
    {
        $data = Products::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = Products::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa sản phẩm thành công');
        } else {
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
