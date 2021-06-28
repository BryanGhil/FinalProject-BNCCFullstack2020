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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'ForumController@profile');

Route::get('/profileEdit','ForumController@profileEdit');

Route::resource('/forum', 'ForumController');

Route::resource('/comment', 'CommentController');

Route::resource('/reply', 'ReplyController');


Auth::routes();

Route::get('/home', 'ForumController@index')->name('home');

Auth::routes();

Route::get('/home', 'ForumController@index')->name('home');
