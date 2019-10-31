<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductStyle;
use Illuminate\Http\Request;

class ProductStyleController extends Controller
{
    public function index()
    {
        $product_style = ProductStyle::getAll();
        return view('admin.product_style.index', compact('product_style'));
    }
    public function postCreate(Request $request)
    {
        $data = ProductStyle::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới kiểu sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = ProductStyle::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa kiểu sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = ProductStyle::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa kiểu sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
