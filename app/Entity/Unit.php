<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	protected $table = 'erp_product_unit';
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


}
