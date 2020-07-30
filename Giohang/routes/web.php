<?php

use App\Http\Controllers\ProductController;
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

Route::get('/','ProductController@index')->name('index');
Route::get('/{id}','ProductController@show')->name('show');
Route::get('/{id}/cart','ProductController@addcart')->name('addcart');
Route::post('/{id}/addcart','ProductController@ApiAddcart')->name('APIaddcart');
Route::post('/{id}/delete','ProductController@APIdelcart')->name('APIdelete');
Route::get('/showcart/alo','ProductController@displayCart')->name('showcart');
Route::post('/sesion/aaaa/{id}','ProductController@Apicart');
