<?php

namespace App\Http\Controllers;

use App\Product;
// use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = [];
        if (count(session('cart'))>0){
            foreach (session('cart') as $item) {
                $product = Product::findOrFail($item[0]);
                $data[] = [$product, $item[1]];
            }
        }else{
            $data = "Hiện không có sản phẩm";
        }
        return view('products.index', compact('products','data'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}
