<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::getAll();
        return view('admin.services.index', compact('services'));
    }
    public function edit($id)
    {
        $services = Services::find($id);
        return view('admin.services.edit', compact('services'));
    }
    public function getCreate()
    {
        return view('admin.services.create');
    }
    public function postCreate(Request $request)
    {
        $data = Services::postCreate($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới dịch vụ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function postEdit(Request $request)
    {
        $data = Services::postEdit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa dịch vụ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Services::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa dịch vụ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
