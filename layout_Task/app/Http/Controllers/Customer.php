<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index()
    {
        $customer = [
            ["1",'Nguyễn Văn A','0123456789','nguyenvana@gmail.com'],
            ["2",'Nguyễn Văn B','0123456789','nguyenvanb@gmail.com'],
            ["3",'Nguyễn Văn C','0123456789','nguyenvanc@gmail.com'],
            ["4",'Nguyễn Văn D','0123456789','nguyenvand@gmail.com'],
            ["5",'Nguyễn Văn E','0123456789','nguyenvane@gmail.com'],
        ];

        return view('list',compact('customer'));
    }
}
