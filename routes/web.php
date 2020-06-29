<?php


if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/setting', 'HomeController@setting')->name('setting');
    Route::match(['get', 'post'], '/edit/{user}', 'HomeController@edit');

});

Route::group(['middleware' => ['role:admin|kasir']], function () {
    Route::get('/product', 'HomeController@product')->name('product');
});



