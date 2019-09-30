<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use App\Models\Types;

class HomeController extends Controller
{

    public function index()
    {
        $products = Products::getAll();
        return view('customer.index', compact('products'));
    }

    public function products()
    {
        $brands = Brands::getAll();
        $products = Products::getAll();
        $types = Types::getAll();
        return view('customer.products', compact('products', 'brands', 'types'));
    }

    public function news()
    {
        return view('customer.news');
    }

    public function about()
    {
        return view('customer.about');
    }

    public function warranty()
    {
        return view('customer.warranty');
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function newsDetail()
    {
        return view('customer.news-detail');
    }

    public function productDetail($id)
    {
        dd($id);
        $products = Products::getProductId($id);
        dd($products);
        return view('customer.product-detail', compact('products', 'brands', 'types'));
    }
}