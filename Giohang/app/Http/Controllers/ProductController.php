<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        $data = $this->getCart();

        return view('products.index', compact('products', 'data'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $data = $this->getCart();

        return view('products.show', compact('product','data'));
    }

    public function dashboard()
    {
        if (Auth::user()) {
            $products = Product::all();
            $data = $this->getCart();
            return view('dashboard.index', compact('products','data'));
        } else {
            return redirect('/login');
        }
    }

    public function getCart(){
        $data = [];
        $trashed = Product::onlyTrashed()->get();
        if (request()->session()->has('cart')) {
            $cart = session('cart');
            // dd(session('cart'));
            // dd($cart);
            if (count($cart) > 0) {
                foreach ($cart as $key => $item) {
                    foreach ($trashed as $val){
                        if ($item[0] == $val->id){
                            unset($cart[$key]);
                        break;
                        }
                    }
                }
                // dd($cart);
                request()->session()->put('cart', $cart);
                foreach (session('cart') as $item){
                    $product = Product::findOrFail($item[0]);
                    if ($product->trashed()) dd('hello');
                    $data[] = [$product, $item[1]];
                }
            }
        }
        // request()->session()->flush();
        return $data;
    }
    // public function apiList()
    // {
    //     $product = Product::all();
    //     $table = '<table class="table">
    //     <thead>
    //       <tr>
    //         <th scope="col">#</th>
    //         <th scope="col">Name</th>
    //         <th scope="col">Description</th>
    //         <th scope="col">Price</th>
    //         <th scope="col">Image</th>
    //         <th scope="col">Created At</th>
    //         <th scope="col">Updated At</th>
    //         <th scope="col"> </th>
    //       </tr>
    //     </thead>
    //     <tbody>';
    //     foreach ($product as $key => $product){
    //         $table .= '<tr>
    //         <th scope="row">'.$product->id.'</th>
    //         <td>'.$product->name.'</td>
    //         <td>'.$product->description.'</td>
    //         <td>'.$product->price.'</td>
    //         <td><img style="width:50px;height:50px" src="'.$product->image.'" alt=""></td>
    //         <td>'.$product->created_at.'</td>
    //         <td>'.$product->updated_at.'</td>
    //         <td><button>Edit</button> <button>Delete</button></td>
    //       </tr>';
    //     }
    //     $table .= '</tbody></table>';
    //     return response()->json($table);
    // }

    public function ListProduct()
    {
        $products = Product::all();
        $data = $this->getCart();

        return view('dashboard.managerProduct', compact('products','data'));
    }

    public function create(Request $request)
    {

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        // request()->session()->flash('success', $message);

        return response()->json($product);
    }

    public function getProduct($id)
    {

        $product =Product::findOrFail($id);
        // request()->session()->flash('success', $message);

        return response()->json($product);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json("Đã xóa sản phẩm $product->name");
    }

    public function edit($id,Request $request)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        return response()->json($product);
    }
}
