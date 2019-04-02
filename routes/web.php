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
	Route::get('/admin-do', 'admin\IndexController@index');
	Route::get('/home-info', 'admin\IndexController@info');


	//采购
	Route::get('/purchase-list', 'admin\PurchaseController@toList');
	Route::get('/purchase-add', 'admin\PurchaseController@toAdd');
	Route::post('/service/purchase-add', 'admin\PurchaseController@add');  //添加


	//采购报表
	Route::get('/report-purchase-list', 'admin\ReportController@list');
	//Route::get('/purchase-add', 'admin\PurchaseController@add');
	Route::get('/suppliers-box', 'admin\PurchaseController@showSuppliersBox');  //显示供应商菜单


	//设置
	Route::get('/supplier-list', 'admin\SupplierController@supplierList'); //供应商列表
	Route::get('/customer-list', 'admin\CustomerController@customerList'); //客户列表
	Route::get('/category-list', 'admin\CategoryController@categoryList'); //供应商/客户 类别列表


	Route::get('/excel/export','ExcelController@export');
	Route::get('/excel/import','ExcelController@import');


	Route::get('/report/downloadfile/{file}','ExcelController@downloadFile');


Route::group(['prefix' => 'admin'],function() {



});


