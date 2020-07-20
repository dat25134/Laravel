<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calculator extends Controller
{
    public function cal(Request $request){
        $text = $request->cal;
        if (count(explode("+",$text))==2){
            $plus = explode("+",$text);
            $result = $plus[0] + $plus[1];
        }
        if (count(explode("-",$text))==2){
            $plus = explode("-",$text);
            $result = $plus[0] - $plus[1];
        }
        if (count(explode("x",$text))==2){
            $plus = explode("x",$text);
            $result = $plus[0] * $plus[1];
        }
        if (count(explode("/",$text))==2){
            $plus = explode("/",$text);
            $result = $plus[0] / $plus[1];
        }
        // dd($result);
        return view('index',compact('result'));
    }
}
