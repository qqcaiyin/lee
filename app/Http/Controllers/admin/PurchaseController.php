<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PurchaseController extends  Controller{



	//采购订单列表
	public function list(){

		return view('admin/purchase/list');

	}

	//添加采购订单
	public function add(){

		return view('admin/purchase/add');

	}

	public function showSuppliersBox(){

		return view('admin/purchase/suppliers');
	}




}