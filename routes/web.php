<?php

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
Route::post('/carousel/add','CarouselController@add');
Route::delete('/carousel/del','CarouselController@del');
Route::post('/carousel/edit','CarouselController@edit');
Route::get('/carousel/show','CarouselController@show');