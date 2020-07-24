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

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/','BlogController@index' )->name('blogs.index');
    Route::get('/{id}','BlogController@show')->name('blogs.show');
    Route::post('/logout','BlogController@logout');
    Route::post('/creatpost','BlogController@addPost');
  });
Route::get('/creatpost', function () {
    return view('ckediter');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
