<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends  Controller{

	public function index(){

		return view('admin/index');
	}

	//后台首页
	public function info(){

		return view('admin/info');
	}


}