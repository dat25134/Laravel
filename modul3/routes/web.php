<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/disPrice', function () {
    return view('productDiscount');
});

Route::post('/disPrice', function (Illuminate\Http\Request $post) {
    $product = $post->product;
    $price = $post->price;
    $percent = $post->percent;
    $disAmount = $percent*0.01*$price;
    $disPrice = $price-$disAmount;
    return view('productDiscount',['product'=>$product, 'price'=>$price, 'percent' => $percent, 'disAmount'=>$disAmount, 'disPrice' => $disPrice]);
});

Route::get('/trans', function (Illuminate\Http\Request $post) {
    $word = $post->word;
    $trans=[
        'hello' => "xin chào",
        'cat'   => 'con mèo',
        'dog'   => 'con chó',
        'school'=> 'trường học'
    ];
    $dich='';
    foreach ($trans as $key => $val){
        if (strtolower($word)==$key){
            $dich = $val;
        break;
        }
    }
    return view('translate',[ 'word' => $word, 'dich' => $dich]);
});




