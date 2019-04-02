<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Category;
use App\Entity\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class CategoryController extends  CommonController {



	//供应商列表
	public function categoryList(Request $request){

		$data = $request->input('id');
		$id = $this->requestCheck($data);

		return view('admin/set/category',compact('id'));

	}

	//添加采购订单
	public function toAdd(){

		$sn = $this->createSN();
		return view('admin/customer/add',compact('sn'));

	}


	/**
	 * 所有商品表 -弹出层
	 * @return
	 */
	public function showSuppliersBox(Request $request){

		$data= $request->all();
		$where =1;
//判断是否点击搜索了
		if(isset($data['is_search'])){
			if (!empty($data['keywords'])) {
				$where .= ' and p.name like "%' . trim($data['keywords']) . '%" ';
			}
			if ($data['category_id'] != 0) {
				$where .= ' and c.path like "%,' .trim( $data['category_id']) . ',%"';
			}
			//查找满足条件的数据
			$products = DB::table('product as p')
				->leftjoin('category as c', 'p.category_id', '=', 'c.id')
				->select('p.*')
				->whereRAW($where)
				->where('is_del', 0)
				->orderby('id', 'desc')
				->paginate(10);
			//搜索分页时追加的搜索条件
			$appendData = array(
				'is_search' => 1,
				'category_id' => $data['category_id'],
				'keywords' => trim($data['keywords'])
			);
			$products->appends($appendData);
			//用于回显
			$products->search = $appendData;
		}else{
//非搜索情况，获取产品的数据
			$products = Product::where('is_del',0)->orderby('id','desc')->paginate(10);
		}

		//获取每个产品对应的父类列表
		$_cate = array();
		foreach ($products as $product) {
			if ($product->category_id != 0) {
				$category = Category::find($product->category_id);
				$_cate = explode(',', $category->path);
				array_shift($_cate);
				array_pop($_cate);
				$product->category = Category::whereIn('id', $_cate)->get();
			}
		}
		//获取下拉分类栏
		$cate =$this->_getTree();
		return view('admin/purchase/suppliers',compact('products','cate'));
	}
	/**
	 * 获取分类树
	 * @return obj
	 */
	private function _getTree(){
		$categories = Category::select('id','name','parent_id','path')->orderby('path','asc')->get();
		foreach ($categories as $category){
			$arr = explode(',',$category->path);
			$tot = count($arr)-3;
			$category->name =str_repeat('|----',$tot).$category->name;
		}
		return $categories;
	}

///////////////////service///////////////////////////////

	public function add(Request $request){

		$data = $request->all();
		dd($data);
	}

}