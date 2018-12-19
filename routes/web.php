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

Route::get('/blog','BlogController@index')->name('blog.home');
Route::get('/blog/{slug}','BlogController@showPost')->name('blog.detail');

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('/admin',function (){
    return redirect('/admin/post');
});

Route::middleware('auth')->namespace('Admin')->group(function (){
    Route::resource('admin/post','PostController');
    Route::resource('admin/tag','TagController',['except' => 'show']);
    Route::get('admin/upload','UploadController@index');
    Route::post('admin/upload/file','UploadController@uploadFile');
    Route::delete('admin/upload/file','UploadController@deleteFile');
    Route::post('admin/upload/folder','UploadController@createFolder');
    Route::delete('admin/upload/folder','UploadController@deleteFolder');
});

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');