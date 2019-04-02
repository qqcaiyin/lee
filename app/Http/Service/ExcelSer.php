<?php

namespace  App\Http\Service;

use Maatwebsite\Excel\Facades\Excel;

class ExcelSer{


	/**
	 * 导出数据库的表到excel.
	 * name  excel 	名称
	 * sheetname
	 * type			导出格式
	 * cellData 	详细数据
	 *
	 */
	public  function exportSer($cellData,$name = '',$sheetName = '',$type = 0){


		Excel::create($name,function($excel) use ($sheetName,$cellData){
			$excel->sheet($sheetName, function($sheet) use ($cellData){
				$sheet->fromModel($cellData)
					->freezeFirstRow();//冻结第一行
			});

		})->store('xls',storage_path('/exports'));


	}



}