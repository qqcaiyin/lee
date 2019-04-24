<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
	protected $table = 'erp_msg';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = [];
	//保护字段


	/**
	 * 获取侧边栏分类  1级
	 * @return array
	 */

}
