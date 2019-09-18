<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        $types = Types::getAll();
        return view('admin.types.index', compact('types'));
    }
    public function postCreate(Request $request)
    {
        $data = Types::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới loại sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = Types::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa loại sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Types::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa loại sản phẩm thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
