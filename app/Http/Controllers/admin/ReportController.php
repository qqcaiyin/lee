<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends  Controller{



	//采购报表
	public function list(){

		return view('admin/report/purchase/list');

	}


}