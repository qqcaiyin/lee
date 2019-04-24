<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
	protected $table = 'erp_customer_type';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = [];
	//保护字段


	//检测类型是否重复
	public static function typeIsExists($data){
		$res = 0;
		if($data ){
			$res = self::where($data)->first();
		}
		return $res;
	}

	//插入数据
	public  static function insertData($data){

		return self::insertGetId($data);
	}

	//获取客户信息列表


}
