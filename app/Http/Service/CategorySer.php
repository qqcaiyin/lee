<?php


namespace  App\Http\Service;

use App\Entity\CustomerType;
use App\Entity\SupplierType;
use App\Exceptions\ApiException;
use DB;
class CategorySer{

	protected  $customerType;
	protected  $supplierType;
	protected  $productType;

	public function __construct( CustomerType $customerType,SupplierType $supplierType){
		$this->customerType = $customerType;
		$this->supplierType = $supplierType;
	}
	//获取类型列表
	public function  getTypeList( $modelName){
		return  $this->{$modelName}->get()->toarray();
	}


	/*
	 * 供应商 / 客户 / 商品   类别的添加编辑
	 *  modelName   类型
	 * data        写入的数据
	 */
	public function addType($modelName= 'customerType',$data = []){
		//检测是否有重复
		$isExists = $this->{$modelName}->typeIsExists($data);
		if($isExists){
			throw new ApiException('修改失败，类名称重复');
		}
		//拼接要插入的数据
		$data2=[
			'tid' => $this->createTid($modelName),
			'create_time' => time(),
			'create_uid' =>1,
		];
		$dataArr =array_merge($data,$data2);
		return $this->{$modelName}->insertData($dataArr);

	}

	//生成编号
	protected function createTid($modelName){
		
		$heah = $modelName;
		$heah = strtoupper(substr($modelName,0,1));
		$rand = rand(1000,9999);
		$tid = $heah . $rand;
		//判断数据表里是否有相同的编号
		$data=[
			'tid' => $tid,
		];
		$isExists = $this->{$modelName}->typeIsExists($data);
		if($isExists){
			$this->customerCreateTid();
		}
		return $tid;
	}














}


