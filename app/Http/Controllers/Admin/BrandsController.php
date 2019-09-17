<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::getAll();
        return view('admin.brands.index', compact('brands'));
    }
    public function postCreate(Request $request)
    {
        dd(123);
        $brands = Brands::create($request);
        if ($brands == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới thương hiệu thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }
    public function postEdit(Request $request)
    {
        $brands = Brands::edit($request);
        if ($brands == 200) {
            return redirect()->back()->with('success', 'Bạn đã thêm mới thương hiệu thành công');
        } else {
            return redirect()->back()->with('fail', 'Có lỗi xảy ra, vui lòng kiểm tra lại');
        }
    }

    public function update(UpdateBrandsRequest $request, Brands $Brands)
    {
        abort_unless(\Gate::allows('Brands_edit'), 403);

        $Brands->update($request->all());

        return redirect()->route('admin.brands.index');
    }

    public function show(Brands $Brands)
    {
        abort_unless(\Gate::allows('Brands_show'), 403);

        return view('admin.brands.show', compact('Brands'));
    }

    public function destroy(Request $request)
    {
        dd(1);
        abort_unless(\Gate::allows('Brands_delete'), 403);

       // $Brands->delete();

        return back();
    }

    public function massDestroy(MassDestroyBrandsRequest $request)
    {
        Brands::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
