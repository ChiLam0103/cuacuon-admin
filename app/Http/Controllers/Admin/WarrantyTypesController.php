<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarrantyTypes;
use Illuminate\Http\Request;

class WarrantyTypesController extends Controller
{
    public function index()
    {
        $warranty_types = WarrantyTypes::getAll();
        return view('admin.warranty_types.index', compact('warranty_types'));
    }
    public function postCreate(Request $request)
    {
        $data = WarrantyTypes::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới chính sách bảo hành thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = WarrantyTypes::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa chính sách bảo hành thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = WarrantyTypes::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa chính sách bảo hành thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
