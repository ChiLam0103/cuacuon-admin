<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewTypes;
use Illuminate\Http\Request;

class NewTypesController extends Controller
{
    public function index()
    {
        $new_types = NewTypes::getAll();
        return view('admin.new_types.index', compact('new_types'));
    }
    public function postCreate(Request $request)
    {
        $data = NewTypes::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới loại tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = NewTypes::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa loại tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = NewTypes::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa loại tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
