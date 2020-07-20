<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/',"CustomerController@index");
Route::post('/create',"CustomerController@create");
Route::get('/{index}',"CustomerController@show");
Route::post('/{index}/edit',"CustomerController@edit");
Route::get('/{index}/del',"CustomerController@delete");
