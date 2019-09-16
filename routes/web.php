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
    return view('home');
})->name('home');

Route::get('/home', function () {
	return view('home');
});
Route::get('index','index@index');

Auth::routes();

Route::get('/blog/{method}', 'blog@index')->name('blog');
Route::get('/userdir/{method}', 'blog@showUserDir')->name('userdir')->middleware('auth');
Route::get('/userfile/{method}', 'blog@showUserFile')->name('userfile');
Route::get('/userhtml/{method}', 'blog@showUserHtml')->name('userhtml');

Route::post('/blog/createdir/{method}', 'blog@createDir')->name('blogcreate')->middleware('auth');
Route::post('/userdir/createdir/{method}', 'blog@createDir')->name('userdircreate')->middleware('auth');
Route::post('/updatedir/{method}', 'blog@updateDir')->name('updatedir')->middleware('auth');
Route::post('/userfile/createfile/{method}', 'blog@createFile')->name('userfilecreate')->middleware('auth');
Route::post('/userhtml/createfile/{method}', 'blog@createFile')->name('userfilecreate')->middleware('auth');
Route::post('/userhtml/updatefile/{method}', 'blog@updateFile')->name('userfileupdate')->middleware('auth');
Route::post('/userfile/updatefile/{method}', 'blog@updateFile')->name('userfileupdate')->middleware('auth');

Route::get('/showMd/{method}', 'blog@showMd')->name('showmd');
Route::get('/showHtml/{method}', 'blog@showHtml')->name('showmd');


Route::get('/link/{type?}', 'Link@index')->name('link');
Route::post('/link/create', 'Link@create')->name('createlink');
Route::post('/link/update', 'Link@update')->name('updatelink');



Route::get('/birthday-card', function () {
    return view('birthday');
});