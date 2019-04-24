<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Msg;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Service\CategorySer;
use App\Http\Service\MsgSer;
use Illuminate\Http\Request;

use DB;

class MsgController extends  CommonController {

	protected  $msgSer;

	public function __construct( MsgSer $msgSer ){
		$this->msgSer = $msgSer;
	}



	//类型 列表
	public function toMsgList(Request $request){

		return view('admin/msg/list');
	}

	//发布的消息记录
	public  function toMsgIssueList(){

		$msgs = $this->msgSer->getIssuedMsg();

		return view('admin/msg/issuedlist',compact('msgs'));

	}




	//发布公告界面
	public function toMsgIssue(){
		return view('admin/msg/issue');
	}

	public function msgIssue(Request $request){
		$data = $request->except('_token');

		$data['create_time'] = time();
		$data['status'] = 0;
		$data['uid'] = 10001;

		$idRes = Msg::insertGetId($data);
		if($idRes){
			return $this->success('添加成功');
		}
		return $this->failed('添加失败');
	}



}