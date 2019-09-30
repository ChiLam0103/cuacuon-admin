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
        $product=Products::getProductId($id);
        return view('customer.product-detail', compact('product'));
    }
}
