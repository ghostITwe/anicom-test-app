<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $categories = Category::get();
        $products = Product::get();

        return view('product.products', [
            'products' => $products
        ]);
    }
}
