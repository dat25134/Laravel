<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = [];
        if (request()->session()->has('cart')){
            if (count(session('cart'))>0){
                foreach (session('cart') as $item) {
                    $product = Product::findOrFail($item[0]);
                    $data[] = [$product, $item[1]];
                }
            }
        }

        return view('products.index', compact('products','data'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function dashboard()
    {
        if (Auth::user()){
            return view('dashboard.index');
        }else {
            return redirect('/login');
        }


    }


}
