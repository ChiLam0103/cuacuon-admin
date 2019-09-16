<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Brands;

class BrandsController extends Controller
{
    public function index()
    {

        $brands = Brands::all();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('Brands_create'), 403);

        return view('admin.brands.create');
    }

    public function store(StoreBrandsRequest $request)
    {
        abort_unless(\Gate::allows('Brands_create'), 403);

        $Brands = Brands::create($request->all());

        return redirect()->route('admin.brands.index');
    }

    public function edit(Brands $Brands)
    {
        abort_unless(\Gate::allows('Brands_edit'), 403);

        return view('admin.brands.edit', compact('Brands'));
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

    public function destroy(Brands $Brands)
    {
        abort_unless(\Gate::allows('Brands_delete'), 403);

        $Brands->delete();

        return back();
    }

    public function massDestroy(MassDestroyBrandsRequest $request)
    {
        Brands::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
