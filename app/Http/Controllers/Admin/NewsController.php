<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewTypes;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAll();
        $new_types = NewTypes::getAll();
        return view('admin.news.index', compact('news','new_types'));
    }
    public function edit($id)
    {
        $news = News::find($id);
        $new_types = NewTypes::getAll();
        return view('admin.news.edit', compact('news','new_types'));
    }
    public function postCreate(Request $request)
    {
        $data = News::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function postEdit(Request $request)
    {
        $data = News::postEdit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = News::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa tin tức thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
}
