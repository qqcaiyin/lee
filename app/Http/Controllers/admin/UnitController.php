<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use Illuminate\Http\Request;

use DB;

class UnitController extends  CommonController {


	public function __construct()
	{

	}


	//计量单位列表
	public function unitList(Request $request){

		$units = Unit::get()->toarray();

		return view('admin/set/unit',compact('units'));
	}

	//计量单位
	public function toUnitEdit(Request $request){
		$unitId = $request->input('id');
		$where =[
			'id'=> $unitId,
		];
		$unit = Unit::where($where)->first();
		if($unit){
			$unit = $unit->toarray();
			return $this->respondWithSuccess($unit);
		}
		return $this->failed('单位编号异常');
	}

	//删除计量单位
	public function unitDel(Request $request){
		$unitId = $request->input('id');
		$where =[
			'id' => $unitId,
		];

		$res = Unit::where($where)->delete();
		if($res){
			return $this->success('删除成功');
		}
		return $this->failed('删除失败');

	}


	//添加+编辑  计量单位
	public function unitAdd(UnitRequest $request){
		$data = $request->except('_token');
		$dataArr =[
			'desc'=> $data['desc'],

		];

		//编辑界面
		if($data['act'] == 1){
			//检测是否重复
			$unitExists = Unit::where('id','!=',$data['id'])->where($dataArr)->first();
			if($unitExists) {
				return $this->failed('修改失败，单位名称重复');
			}
			Unit::where('id',$data['id'])->update($dataArr);
			return $this->success('修改成功');

		}else if($data['act'] == 0){
			//检测是否重复
			$unitExists = Unit::where($dataArr)->first();
			if($unitExists){
				return $this->failed('修改失败，单位名称重复');
			}
			//插入数据
			$res = Unit::insertGetId($dataArr);
			if($res){
				return $this->success('添加成功');
			}
			return $this->failed('添加失败');
		}
	}





}