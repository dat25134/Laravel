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
            $products = Product::all();
            return view('dashboard.index', compact('products'));
        }else {
            return redirect('/login');
        }


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
        return view('dashboard.managerProduct', compact('products'));
     }

     public function create(CreateProductRequest $request)
     {

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        $message = 'toastr.options = {"positionClass": "toast-bottom-right",};toastr["success"]("Thêm sản phẩm mới thành công", "Success");';
        request()->session()->flash('success',$message);

        return redirect('/products/dashboard/list');
     }

     public function delete($id)
     {
        $product = Product::findOrFail($id);
        $product->delete();
        $products = Product::all();
        $tbody = '';
        return response()->json("Đã xóa sản phẩm $product->name");
     }



}
