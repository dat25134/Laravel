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

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function addcart($id)
    {
        if (!request()->session()->has('cart')) {
            $cart = [$id, 1];
            request()->session()->push('cart', $cart);
        } else {
            $data = session('cart');
            $check = true;
            foreach ($data as $key => $product) {
                if ($product[0] == $id) {
                    $data[$key][1]++;
                    $check = false;
                    request()->session()->put('cart', $data);
                    break;
                }
            }
            if ($check) {
                $cart = [$id, 1];
                // Session::push('cart', $cart);
                request()->session()->push('cart', $cart);
            }
        }

        return redirect('/showcart/alo');
    }

    public function ApiAddcart($id)
    {
        if (!request()->session()->has('cart')) {
            $cart = [$id, 1];
            request()->session()->push('cart', $cart);
        } else {
            $data = session('cart');
            $check = true;
            foreach ($data as $key => $product) {
                if ($product[0] == $id) {
                    $data[$key][1]++;
                    $check = false;
                    request()->session()->put('cart', $data);
                    break;
                }
            }
            if ($check) {
                $cart = [$id, 1];
                // Session::push('cart', $cart);
                request()->session()->push('cart', $cart);
            }
        }
        $message = "Thêm vào giỏ hàng thành công";
        return response()->json($message);
    }

    public function Apicart(Request $request, $id)
    {
        $data = session('cart');
        $total = 0;
        foreach ($data as $key => $product) {
            if ($product[0] == $id) {
                $data[$key][1] = $request->sl;
                // Session::put('cart', $data);
                request()->session()->put('cart', $data);
            }
        }
        // $productsList = [];
        foreach (session('cart') as $item) {

            $product = Product::findOrFail($item[0]);
            if ($item[0] == $id) {
                $totalid = $product->price*$item[1];
            }
            $total += $product->price * $item[1];
        }
        return response()->json([$total,$totalid]);
    }

    public function delcart($id)
    {
        $data = session('cart');
        foreach ($data as $key => $product) {
            if ($product[0] == $id) {
                unset($data[$key]);
                request()->session()->put('cart', $data);
                break;
            }
        }
        return redirect('/showcart/alo');
    }

    public function displayCart()
    {
        $productsList = [];
        $total = 0;
        foreach (session('cart') as $item) {
            $product = Product::findOrFail($item[0]);
            $productsList[] = [$product, $item[1]];
            $total += $product->price * $item[1];
        }
        // request()->session()->flush();
        return view('products.addcart', compact('productsList', 'total'));
    }
}
