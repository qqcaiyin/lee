<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $table = 'erp_node';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = [];
	//保护字段

}
