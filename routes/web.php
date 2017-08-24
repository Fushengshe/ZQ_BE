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

Route::post('/poetrysociety/add','PoetrySocietyController@add')->middleware('domain');
Route::delete('/poetrysociety/del','PoetrySocietyController@del')->middleware('domain');
Route::post('/poetrysociety/edit','PoetrySocietyController@edit')->middleware('domain');
Route::get('/poetrysociety/show','PoetrySocietyController@show')->middleware('domain');




Route::get('/showlists','ListController@showLists')->middleware('domain');
Route::get('/addlists','ListController@addLists')->middleware('domain');
Route::get('/dellists','ListController@delLists')->middleware('domain');
Route::get('/editlists','ListController@editLists')->middleware('domain');

Route::post('/addart','ArticleController@addArt')->middleware('domain');
Route::post('/editart','ArticleController@editArt')->middleware('domain');
Route::get('/delart','ArticleController@delArt')->middleware('domain');
Route::get('/showart','ArticleController@showArt')->middleware('domain');
Route::get('/showtitle','ArticleController@showTitle')->middleware('domain');
Route::get('/showmore','ArticleController@showMore')->middleware('domain');

Route::get('/addcomment','CommentController@addComment')->middleware('domain');
Route::get('/showcomment','CommentController@showComment')->middleware('domain');
Route::get('/morecomment','CommentController@moreComment')->middleware('domain');