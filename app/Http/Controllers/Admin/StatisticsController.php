<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = Statistics::getAll();
        return view('admin.statistics.index', compact('statistics'));
    }
    public function postCreate(Request $request)
    {
        $data = Statistics::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới số liệu thống kê thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = Statistics::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa số liệu thống kê thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = Statistics::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa số liệu thống kê thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
