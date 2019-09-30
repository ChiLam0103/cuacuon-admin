<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Types;
class HomeController extends Controller
{

    public function index()
    {
        $products=Products::getAll();
        return view('customer.index', compact('products'));
    }
    public function products()
    {
        $brands=Brands::getAll();
        $products=Products::getAll();
        $types=Types::getAll();
        return view('customer.products', compact('products','brands','types'));
    }
    public function productDetail($id)
    {
        dd($id);
        $products=Products::getProductId($id);
        dd($products);
        return view('customer.product-detail', compact('products','brands','types'));
    }
}
