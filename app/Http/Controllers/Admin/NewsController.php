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
    //ajax
    public function ajaxGetEdit(Request $request)
    {
        $output = '';
        $range = '';
        $brand = '';
        $type = '';
        $display = '';
        $checked = '';
        $id = $request->id;
        $products = Products::ajaxGetEdit($id);
        $ranges = Ranges::getAll();
        $brands = Brands::getAll();
        $types = Types::getAll();
        $range_product = Ranges::getAll_Compatibility();
        if ($products->type_id == 1 || $products->type_id == 2) {
            $display = 'inline-block';
        } else {
            $display = 'none';
        }
        foreach ($ranges as $r) {
            foreach ($range_product as $rq) {
                if ($rq->product_id == $products->id && $rq->range_id == $r->id) {
                    $checked = 'checked';
                    break;
                } else {
                    $checked = '';
                }
            }
            $range .= "<div class='range_id' style='display:$display'><label class='checkbox-inline range_id'><input type='checkbox' name='range_id[]' value='$r->id' $checked>$r->size_name</label></div>";
        }
        foreach ($brands as $b) {
            if ($products->brand_id == $b->id) {
                $brand .= "<option value='$b->id' selected>$b->name</option>";
            } else {
                $brand .= "<option value='$b->id'>$b->name</option>";
            }
        }
        foreach ($types as $t) {
            if ($products->type_id == $t->id) {
                $type .= "<option value='$t->id' selected>$t->name</option>";
            } else {
                $type .= "<option value='$t->id'>$t->name</option>";
            }
        }
        $image_link = $products->image_link != '' ? $products->image_link : '/storage/not-found.jpeg';
        $output .= "<div class='row' id='form-data'>
            <input id='id' name='id' type='hidden' value='$products->id'>
            <div class='col-md-6'>
                <div class='form-group '>
                    <label for='title'>Tên sản phẩm*</label>
                    <input type='text' name='name' id='name' class='form-control' value='$products->name' required>
                </div>
                <div class='form-group '>
                    <label for='title'>Giá sản phẩm</label>
                    <input type='text' name='price' id='price' class='form-control' value='$products->price'>
                </div>
                <div class='form-group '>
                    <label for='title'>Mô tả</label>
                    <textarea type='text' name='description' id='description' class='form-control' rows='5'>$products->description</textarea>
                </div>
                $range
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='title'>Thương hiệu</label>
                    <select class='form-control' name='brand_id'>
                        $brand
                    </select>
                </div>
                <div class='form-group'>
                    <label for='title'>Loại sản phẩm</label>
                    <select class='form-control sltType' name='type_id' onchange='sltType(this)'>
                        $type
                    </select>
                </div>
                <div class='form-group'>
                    <label for='exampleInputEmail1'>
                        Ảnh sản phẩm:
                    </label>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='customFile2' name='product_image' id='product_image' onchange='readURL(event, 2)'>
                        <label class='custom-file-label' for='customFile'>
                            Chọn hình ảnh
                        </label>
                    </div>
                    <img id='img2' width='200' height='200' src='$image_link'>
                </div>
            </div></div>";
        echo $output;
    }
}
