<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Entity\Node;
use App\Entity\Product;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Service\CategorySer;
use Illuminate\Http\Request;

use DB;

class RbacController extends  CommonController {

	protected  $categorySer;

	public function __construct( CategorySer $categorySer ){
		$this->categorySer = $categorySer;
	}


	//角色列表
	public function roleList(){

		return view('admin/rbac/role/role');
	}

	//角色列表
	public function adminList(){

		return view('admin/rbac/admin/admin');
	}

	//添加角色界面
	public  function  nodeBox(){

		$nodeArr = Node::get()->toarray();
		$nodes = $this->getRbacTree($nodeArr);
//dd($nodes);
		return view('admin/rbac/nodebox',compact('nodes'));
	}

	//添加管理员界面
	public function toadminAdd(){

		return view('admin/rbac/admin/add');
	}

	//节点列表
	public  function nodeList(){
		$nodeArr = Node::get()->toarray();
		$nodes = $this->getNodeTree($nodeArr);

		return view('admin/rbac/nodelist',compact('nodes'));
	}
	//添加角色
	public function addRule(Request $request){

		$role = $request->all();


		dd($role);
	}

	//添加权限节点
	public function addNode(Request $request){
		$data = $request->except('_token');

		$idRes = Node::insertGetId($data);
		if($idRes){
			return $this->success('添加成功');
		}
		return $this->failed('添加失败');

	}


//"node_title" => "【采购列表】"
//"controller" => "PurchaseController"
//"action" => "toList"
//"sort" => ""
//"url" => "/purchase-list"
//"pid" => "0"







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





}