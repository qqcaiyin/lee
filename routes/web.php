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
	//后台主页
	Route::get('/admin-info', 'admin\IndexController@index');



	//采购
	Route::get('/purchase-list', 'admin\PurchaseController@list');
	Route::get('/purchase-add', 'admin\PurchaseController@add');

	//采购报表
	Route::get('/report-purchase-list', 'admin\ReportController@list');
	Route::get('/purchase-add', 'admin\PurchaseController@add');
	Route::get('/suppliers-box', 'admin\PurchaseController@showSuppliersBox');  //显示供应商菜单


Route::group(['prefix' => 'admin'],function() {



});


