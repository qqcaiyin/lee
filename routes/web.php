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

	Route::get('/unit-list', 'admin\UnitController@unitList'); //商品单位  --列表
	Route::post('/unit-list/del', 'admin\UnitController@unitListDel'); //商品单位  --删除






	Route::get('/excel/export','ExcelController@export');
	Route::get('/excel/import','ExcelController@import');


	Route::get('/report/downloadfile/{file}','ExcelController@downloadFile');



Route::group(['middleware' => 'request.filter'],function() {

	Route::get('/', function () {
		return view('welcome');
	});
	//后台主页
	Route::get('/admin-do', 'admin\IndexController@index');
	Route::get('/home-info', 'admin\IndexController@info');


	//采购
	Route::get('/purchase-list', 'admin\PurchaseController@toList');  //采购列表
	Route::get('/purchase-add', 'admin\PurchaseController@toAdd');    //
	Route::post('/service/purchase-add', 'admin\PurchaseController@add');  //添加


	//采购报表
	Route::get('/report-purchase-list', 'admin\ReportController@list');
	//Route::get('/purchase-add', 'admin\PurchaseController@add');
	Route::get('/suppliers-box', 'admin\PurchaseController@showSuppliersBox');  //显示供应商菜单


	//设置
	Route::get('/supplier-list', 'admin\SupplierController@supplierList'); //供应商列表
	Route::get('/customer-list', 'admin\CustomerController@customerList'); //客户 列表


	Route::get('/category-list', 'admin\CategoryController@categoryList'); //供应商/客户 类别列表
	Route::post('/category/add', 'admin\CategoryController@categoryService'); //客户类别 添加

	Route::get('/unit-list', 'admin\UnitController@unitList'); //商品单位  --列表
	Route::post('/unit/del', 'admin\UnitController@unitDel'); //商品单位  --删除
	Route::post('/unit/add', 'admin\UnitController@unitAdd'); //商品单位  --添加
	Route::get('/unit-getbyid', 'admin\UnitController@toUnitEdit'); //商品单位  --添加

	//权限管理
	Route::get('/rbac-nodebox', 'admin\RbacController@nodeBox'); //

	Route::get('/rbac-role-list', 'admin\RbacController@roleList'); // 角色列表
	Route::post('/rbac-role-add', 'admin\RbacController@addRule'); // 添加角色
	Route::get('/rbac-admin-list', 'admin\RbacController@adminList'); // 管理员列表
	Route::get('/rbac-adminadd', 'admin\RbacController@toadminAdd'); // 管理员列表
	Route::get('/rbac-node-list', 'admin\RbacController@nodeList'); // 权限节点列表
	Route::post('/rbac-node-add', 'admin\RbacController@addNode'); // 权限节点列表

	Route::get('/excel/export','ExcelController@export');
	Route::get('/excel/import','ExcelController@import');

	//获取消息
	Route::get('/msg-list','admin\MsgController@toMsgList');
	Route::get('/msg-issue','admin\MsgController@toMsgIssue');  //公告发布界面
	Route::post('/service/msg-issue','admin\MsgController@MsgIssue');  // 提交发布的消息
	Route::get('/msg-issue-list','admin\MsgController@toMsgIssueList');


	Route::get('/unit/add', 'admin\UnitController@unitAdd'); // 			--去添加界面
	Route::post('/service/unit/add', 'admin\UnitController@unitAdd'); //    --添加操作


	Route::any('/unit/add', 'admin\UnitController@unitAdd'); // 			--去添加界面 和提交


	Route::get('/report/downloadfile/{file}','ExcelController@downloadFile');

});
