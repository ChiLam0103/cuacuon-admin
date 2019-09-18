<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::getAll();
        return view('admin.brands.index', compact('brands'));
    }
    public function postCreate(Request $request)
    {
        $data = Brands::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới thương hiệu thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = Brands::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa thương hiệu thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Brands::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa thương hiệu thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
