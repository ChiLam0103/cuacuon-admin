<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotations;
use Illuminate\Http\Request;

class QuotationsController extends Controller
{
    public function index()
    {
        $quotations = Quotations::getAll();
        return view('admin.quotations.index', compact('quotations'));
    }
    public function detail($id)
    {
        $customer = Quotations::getInfo($id);
        $products = Quotations::getProduct($id);
        //dd($quotations);
        return view('admin.quotations.detail', compact('customer','products'));
    }
}
