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
     phpinfo();
});
//添加数据库
Route::get('/con','Mongo\MongoController@index');
//查询数据库
Route::get('/found','Mongo\MongoController@found');
//删除
Route::get('/del','Mongo\MongoController@del');
//修改
Route::get('/upd','Mongo\MongoController@upd');
//ws
Route::get('/test/ws','Mongo\MongoController@ws')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
