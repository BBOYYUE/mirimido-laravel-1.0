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
Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/','ShowView@home');
Route::get('/WebController','WebController@home');
Route::post('/WebController/reMenu','WebController@reMenu');
Route::post('/WebController/addMenu','WebController@addMenu');
Route::post('/WebController/getRouter','WebController@getRouter');
Route::get('/ShowView','ShowView@home');
Route::get('/ShowView/information','ShowView@information');
Route::post('/ShowView/information/content','information@content');
Route::get('/ShowView/skilltree','ShowView@skilltree');
Route::get('/ShowView/doclibary','ShowView@doclibary');
Route::get('/ShowView/codelibary','ShowView@codelibary');
Route::get('/ShowView/otherview','ShowView@otherview');
Route::get('/AdminView','AdminView@home');
Route::get('/AdminView/libaryadmin','AdminView@libaryadmin');
Route::get('/AdminView/libaryadmin/quickadd','libaryadmin@quickadd');
Route::get('/AdminView/libaryadmin/quickedit','libaryadmin@quickedit');
Route::post('/AdminView/libaryadmin/save','libaryadmin@save');
Route::post('/AdminView/libaryadmin/update','libaryadmin@update');
Route::get('/AdminView/skilltreeadmin','AdminView@skilltreeadmin');
Route::get('/AdminView/docadmin','AdminView@docadmin');
Route::get('/AdminView/diaryadmin','AdminView@diaryadmin');
Route::get('/AdminView/codeadmin','AdminView@codeadmin');
Route::get('/AdminView/otheradmin','AdminView@otheradmin');

