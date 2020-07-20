<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('index',compact('customers'));
    }

    public function create(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        Customer::create(['name'=>$name,'phone' =>$phone,'email'=>$email]);
        return redirect('/');
    }

    public function show($index){
        $customer = Customer::find($index);
        return view('show',compact('customer'));
    }

    public function edit(Request $request){
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        Customer::where('id','=',$id)->update(['name'=>$name,'phone'=>$phone,'email'=>$email]);
        return redirect('/');
    }

    public function delete($index){
        $customer = Customer::find($index);
        $customer->delete();
        return redirect('/');
    }
}
