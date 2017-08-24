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

Route::get('/showlists','ListController@showLists')->middleware('domain');
Route::get('/addlists','ListController@addLists')->middleware('domain');
Route::get('/dellists','ListController@delLists')->middleware('domain');

Route::get('/addart','ArticleController@addArt')->middleware('domain');
Route::get('/editart','ArticleController@editArt')->middleware('domain');
Route::get('/delart','ArticleController@delArt')->middleware('domain');
Route::get('/showart','ArticleController@showArt')->middleware('domain');
Route::get('/showtitle','ArticleController@showTitle')->middleware('domain');
Route::get('/showmore','ArticleController@showMore')->middleware('domain');

Route::get('/addcomment','CommentController@addComment')->middleware('domain');
Route::get('/showcomment','CommentController@showComment')->middleware('domain');
Route::get('/morecomment','CommentController@moreComment')->middleware('domain');