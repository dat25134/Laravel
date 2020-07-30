<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/products');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/{id}', 'ProductController@show')->name('show');
    Route::get('/{id}/cart', 'CartController@addcart')->name('addcart');
    Route::post('/{id}/addcart', 'CartController@ApiAddcart')->name('APIaddcart');
    Route::post('/{id}/delete', 'CartController@APIdelcart')->name('APIdelete');
    Route::get('/showcart/page', 'CartController@displayCart')->name('showcart');
    Route::post('/sesion/page/{id}', 'CartController@Apicart');
    Route::get('/dashboard/index', 'ProductController@dashboard')->name('dashboard.index');
});
