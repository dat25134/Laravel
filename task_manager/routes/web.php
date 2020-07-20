<?php

use App\Http\Controllers\CodeGymController;
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

Route::get('/', 'CustomerController@index');

Route::get('/view/{index}', 'CustomerController@show');

Route::get('/edit/{index}','CustomerController@edit');

Route::get('/del/{delIndex}','CustomerController@destroy');

Route::get('/view', 'TableController@view');
Route::post('/view', 'TableController@store');
Route::get('/codegym', 'CodeGymController@code');
