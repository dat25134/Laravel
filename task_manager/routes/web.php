<?php

use App\Http\Controllers\CodeGymController;
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
    return view('index');
});

Route::get('/view/{index}', function ($index) {
    return view('viewCustomer',['index'=>$index]);
});

Route::get('/edit/{index}', function ($index) {
return view('editCustomer',['index'=>$index]);
});

Route::get('/del/{delIndex}', function ($delIndex) {
return view('index',['delIndex'=>$delIndex]);
});

Route::get('/view', 'TableController@view');
Route::post('/view', 'TableController@store');
Route::get('/codegym', 'CodeGymController@code');
