<?php

namespace App\Http\Controllers;

use App\CodeGym;
use Illuminate\Http\Request;

class CodeGymController extends Controller
{
    public function code(Request $request)
    {
        $codegym = CodeGym::all();
        return view('codegymView',compact('codegym'));
    }
}
