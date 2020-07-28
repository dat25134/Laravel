<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function addcart($id){
        if (!Session::has('cart')){
            $cart = [$id,1];
            Session::push('cart',$cart);
        }else{
            $data = Session::get('cart');
            $check = true;
            foreach($data as $key => $product){
                if ($product[0] == $id){
                    $data[$key][1]++;
                    $check = false;
                    Session::put('cart',$data);
                    break;
                }
            }

            // dd($data);
            if ($check) {
                $cart = [$id,1];
                // dd($cart);
                Session::push('cart',$cart);
            }
        }

        return redirect('/showcart/alo');
    }

    public function delcart($id){
        $data = Session::get('cart');
        foreach($data as $key => $product){
            // dd($product);
            if ($product[0] == $id){
                unset($data[$key]);
                Session::put('cart',$data);
                break;
            }
        }
        return redirect('/showcart/alo');
    }

    public function displayCart(){
        $productsList =[];
        foreach (Session::get('cart') as $item){
            $product = Product::findOrFail($item[0]);
            $productsList[]=[$product,$item[1]];
        }
        // request()->session()->flush();
        return view('products.addcart',compact('productsList'));
    }
}
