<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
        $product = Product::findOrFail($id);
        $message = "Thêm $product->name vào giỏ hàng thành công";
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

    public function APIdelcart($id)
    {
        $data = session('cart');
        foreach ($data as $key => $product) {
            if ($product[0] == $id) {
                unset($data[$key]);
                request()->session()->put('cart', $data);
                break;
            }
        }
        $product = Product::findOrFail($id);
        $message = "Đã xóa $product->name ";
        return response()->json($message);
    }

    public function displayCart()
    {
        $productsList = [];
        $product = new ProductController;
        $data = $product->getCart();
        $total = 0;
        if (request()->session()->has('cart')){
            foreach (session('cart') as $item) {
                $product = Product::findOrFail($item[0]);
                $productsList[] = [$product, $item[1]];
                $total += $product->price * $item[1];
            }
        }
        // request()->session()->flush();
        return view('products.addcart', compact('productsList', 'total','data'));
    }
}
