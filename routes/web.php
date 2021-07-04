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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','Backend\DashboardController@index');
Route::get('backend/category/index',"Backend\CategoryController@index");
Route::get('backend/category/create',"Backend\CategoryController@create");
Route::get('backend/category/edit/{id}',"Backend\CategoryController@edit");
Route::get('backend/category/delete/{id}',"Backend\CategoryController@delete");
// lưu danh mục
Route::post('backend/category/store',"Backend\CategoryController@store");
// cập nhật danh mục
Route::post('backend/category/update/{id}',"Backend\CategoryController@update");
// xóa danh mục
Route::post('backend/category/destroy/{id}',"Backend\CategoryController@destroy");