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

Route::post('/poetrysociety/add','PoetrySocietyController@add');
Route::delete('/poetrysociety/del','PoetrySocietyController@del');
Route::post('/poetrysociety/edit','PoetrySocietyController@edit');
Route::get('/poetrysociety/show','PoetrySocietyController@show');

Route::post('/register','Auth\RegisterController@register');
Route::post('/admin/register','Auth\RegisterController@adminRegister');
Route::get('/email','\App\Mail\Email@email');
Route::post('/login','Auth\LoginController@login');
Route::get('/check','Auth\LoginController@check');