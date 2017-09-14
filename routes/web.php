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
Route::post('/carousel/add','CarouselController@add')->middleware('domain');
Route::delete('/carousel/del','CarouselController@del')->middleware('domain');
Route::post('/carousel/edit','CarouselController@edit')->middleware('domain');
Route::get('/carousel/show','CarouselController@show')->middleware('domain');

Route::get('/indexcarousel','CarouselController@index')->middleware('domain');



Route::post('/poetrysociety/add','PoetrySocietyController@add')->middleware('domain');
Route::delete('/poetrysociety/del','PoetrySocietyController@del')->middleware('domain');
Route::post('/poetrysociety/edit','PoetrySocietyController@edit')->middleware('domain');
Route::get('/poetrysociety/show','PoetrySocietyController@show')->middleware('domain');




Route::post('/register','Auth\RegisterController@register')->middleware('domain');
Route::post('/admin/register','Auth\RegisterController@adminRegister')->middleware('domain');
Route::get('/email','\App\Mail\Email@email')->middleware('domain');
Route::get('/forgot/email','\App\Mail\ForgotPasswordEmail@email')->middleware('domain');
Route::post('/forgot/password','Auth\ForgotPasswordController@forgotPassword')->middleware('domain');
Route::post('/login','Auth\LoginController@login')->middleware('domain');
Route::get('/check','Auth\LoginController@check')->middleware('domain');




Route::get('/showlists','ListController@showLists')->middleware('domain');
Route::post('/addlists','ListController@addLists')->middleware('domain');
Route::get('/dellists','ListController@delLists')->middleware('domain');
Route::get('/editlists','ListController@editLists')->middleware('domain');


Route::get('/indexlists','ListController@index')->middleware('domain');
Route::get('/createlists','ListController@create')->middleware('domain');
Route::get('/storelists','ListController@store')->middleware('domain');



Route::get('/addart','ArticleController@addArt')->middleware('domain');
Route::get('/editart','ArticleController@editArt')->middleware('domain');
Route::get('/delart','ArticleController@delArt')->middleware('domain');
Route::get('/delart','ArticleController@delArt')->middleware('domain');
Route::get('/showart','ArticleController@showArt')->middleware('domain');
Route::get('/showtitle','ArticleController@showTitle')->middleware('domain');
Route::get('/showmore','ArticleController@showMore')->middleware('domain');

Route::get('/indexart','ArticleController@index')->middleware('domain');



Route::get('/addcomment','CommentController@addComment')->middleware('domain');
Route::get('/showcomment','CommentController@showComment')->middleware('domain');
Route::get('/morecomment','CommentController@moreComment')->middleware('domain');


Route::get('/loginpage','Auth\RootController@login');
Route::get('/index','Auth\RootController@index');
/** 本站动态.新闻速递 */
Route::get('/sitemov','ArticleController@SiteMovition')->middleware('domain');
Route::get('/newsexp','ArticleController@NewsExpress')->middleware('domain');

