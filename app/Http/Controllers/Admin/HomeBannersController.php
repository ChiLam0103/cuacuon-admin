<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanners;
use Illuminate\Http\Request;

class HomeBannersController extends Controller
{
    public function index()
    {
        $home_banners = HomeBanners::getAll();
        return view('admin.home_banners.index', compact('home_banners'));
    }
    public function postCreate(Request $request)
    {
        $data = HomeBanners::create($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới ảnh bìa trang chủ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function postEdit(Request $request)
    {
        $data = HomeBanners::postEdit($request);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã chỉnh sửa ảnh bìa trang chủ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function destroy($id)
    {
        $data = HomeBanners::destroy($id);
        if ($data == 200) {
            return redirect()->back()->with('success', 'Bạn đã xóa ảnh bìa trang chủ thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    //ajax
    public function ajaxGetEdit(Request $request)
    {
        $output = '';
        $home_banners = HomeBanners::ajaxGetEdit($request->id);
        $image_link = $home_banners->image_link != '' ? $home_banners->image_link : '/storage/not-found.jpeg';
        $output .= "<div id='form-data'>
            <input id='id' name='id' type='hidden' value='$home_banners->id'>
                    <div class='form-group'>
                    <label for='title'>Tiêu đề</label>
                    <input type='text' name='main_title' class='form-control' value='$home_banners->main_title'>
                </div>
                <div class='form-group'>
                    <label for='title'>Phụ đề</label>
                    <input type='text' name='sub_title' class='form-control' value='$home_banners->sub_title'>
                </div>
                <div class='form-group'>
                    <label for='title'>Nút đường dẫn</label>
                    <input type='text' name='button_link' class='form-control' value='$home_banners->button_link'>
                </div>
                <div class='form-group'>
                    <label for='exampleInputEmail1'>
                        Ảnh bìa:
                    </label>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='customFile2' name='image_link' onchange='readURL(event, 2)'>
                        <label class='custom-file-label' for='customFile2'>
                            Chọn hình ảnh
                        </label>
                    </div>
                    <img id='img2' width='200' height='200' src='$image_link'>
                </div>
                </div>";
        echo $output;
    }
}
