<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoTags;
use Illuminate\Http\Request;

class SeoTagsController extends Controller
{
    public function index()
    {
        $seo_tags = SeoTags::getAll();
        return view('admin.seo_tags.index', compact('seo_tags'));
    }
    public function postCreate(Request $request)
    {
        $data = SeoTags::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới thẻ seo thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function edit(Request $request)
    {
        $data = SeoTags::edit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa thẻ seo thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = SeoTags::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa thẻ seo thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
