<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Entity\Product;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Service\CategorySer;
use Illuminate\Http\Request;

use DB;

class CategoryController extends  CommonController {

	protected  $categorySer;

	public function __construct( CategorySer $categorySer ){
		$this->categorySer = $categorySer;
	}

	//类型 列表
	public function categoryList(Request $request){

		$tab = $request->input('id') ?? 1;

		$type = $this->getCate($tab);
		$typeList = $this->categorySer->getTypeList($type);
		$cate=[
			'tab' =>$tab,
			'list' => $typeList,
		];
		return view('admin/set/category',compact('cate'));
	}

	/*
	 * 供应商 / 客户 / 商品   类别的添加编辑
	 * tab  1:  客户
	 *      2： 供应商
	 *      3： 商品
	 * act  0:  添加
	 *      1： 编辑
	 * desc   类别描述
	 * id     编辑的ID号
	 */
	public function categoryService(Request $request){
		$data = $request->except('_token');
		$tab = $data['tab'];
		$act = $data['act'];

		$type = $this->getCate($tab);

		if($act== 0){
			//添加
			$dataArr = [
				'desc'=>$data['desc'],
			];
			$res = $this->categorySer->addType($type,$dataArr);
		}else if($act == 1){
			//编辑

		}


		if($res){
			return $this->success('添加成功');
		}
		return $this->failed('添加失败');
	}

	//
	public function getCate($cate){
		$type = '';
		if($cate == 1 ){
			$type = 'customerType';
		}else if($cate == 2 ){
			$type = 'supplierType';
		}
		return $type;

	}



}