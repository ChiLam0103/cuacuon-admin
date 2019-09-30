<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ranges;
use Illuminate\Http\Request;

class RangesController extends Controller
{
    public function index()
    {
        $ranges = Ranges::getAll();
        return view('admin.ranges.index', compact('ranges'));
    }
    public function postCreate(Request $request)
    {
        $data = Ranges::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới độ tương thích thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = Ranges::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa độ tương thích thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Ranges::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa độ tương thích thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
