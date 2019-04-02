<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Http\Requests\PurchaseExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Service\ExcelSer;
use App\Http\Controllers\Admin\CommonController;

class ExcelController extends CommonController
{

	public $excelExport;

	public  function __construct(ExcelSer $excelExport)
	{
		$this->excelExport = $excelExport;
	}


	/**
	 * 导出数据库的表到excel.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function export(PurchaseExport $request)
	{
		$data = $this->requestCheck($request->all());
		$starttime = $data['starttime'];
		$endtime = $data['endtime'];
		$keywords = $data['$keywords'];

		$cellData = Category::select('id','name', 'category_no','parent_id' )->get()->toarray();
		$cellData[0] = ['id','名称','编号','父类'];

		$this->excelExport->exportSer($cellData,'pur','第一页');
		return  json_encode( ['status' => 0 , 'url' =>'/report/downloadfile/pur.xls']);
	}


	public function  downloadFile(){
		$file = storage_path() . '/exports/pur.xls';
		return  response()->download($file);
	}



}
