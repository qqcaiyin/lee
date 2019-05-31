<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = [];
	//保护字段


	/**
	 * 获取侧边栏分类  1级
	 * @return array
	 */
	public static function getParentCategory(){
		 return  Category::where('parent_id','0')->where('is_show',1)->get();

	}

	/**
	 * 根据父id  获取单层children
	 * @return array
	 */
	public static function getChildrenCategoryByParentId($pid){
		return  Category::where('parent_id',$pid)->where('is_show',1)->orderby('category_no','desc')->get();

	}

	/**
	 * 根据父id  获取所有的子类
	 * @return array
	 */
	public static function getAllChildrenCategoryByParentId($categoryId = 0)
	{

		$where = ' path like "%,' . trim($categoryId) . ',%"';
		$cateIds = Category::whereRaw($where)->where('is_show', 1)->select('id')->get()->toarray();
		if ($cateIds) {
			$cateIds = array_column($cateIds,'id');
		}
		return $cateIds;
	}






	/**
	 * 获取侧边栏分类  2级
	 * @return array
	 */
	public static function getCateList(){
		$categories = Category::where('parent_id','0')->get();
		foreach ($categories as $category){
			$category->son = Category::where('parent_id',$category->id)->where('is_show',1)->orderby('category_no','desc')->get();
		}
		return $categories;
	}

	/**
	 * 获取面包屑父类
	 * @return array
	 */
	public static function getCatParent($id){
		$category = Category::where('is_show',1)->find($id);
		$_cate = explode(',', $category->path);
		array_shift($_cate);
		array_pop($_cate);
		$data = Category::select('id','name')->whereIn('id', $_cate)->get();
		return $data;
	}

	/**
	 * 获取子类,单层
	 * @return array
	 */
	public static function getCatSon($id){


		$result = Category::where('parent_id',$id)
				->where('is_show', 1)
				->where('id','!=',trim($id))
				->orderby('category_no', 'desc')
				->get()->toarray();
		return $result;
	}
	/**
	 * 查询单分类数据
	 * @return array
	 */
	public static function getCateInfo($id){
		$data = Category::select('name')->where('id', $id)->first();
		return $data;
	}
}
