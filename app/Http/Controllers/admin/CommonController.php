<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class CommonController extends Controller
{

	/**
	 * 返回数据
	 * @param string $message
	 * @return \Illuminate\Http\Response
	 */

	protected function respondWithSuccess($data, $message='',$code=200, $status = 'success'  ){
		return new Response(json_encode([
					'status' => $status,
					'code' =>$code,
					'message' => $message,
					'result' => $data
				]));
	}

	/**
	 * 响应成功
	 * @param string $message
	 * @return \Illuminate\Http\Response
	 */
	protected function success($message='',$code=200, $status = 'success'  ){
		return new Response(json_encode([
			'status' => $status,
			'code' =>$code,
			'message' => $message,
		]));
	}

	/**
	 * 响应错误
	 * @param string $message
	 * @param int $code
	 * @param string $status
	 * @return Response
	 */
	protected function failed($message = '', $code = 404, $status = 'error')
	{
		return new Response(json_encode([
			'status' => $status,
			'code' => $code,
			'message' => $message,
		]));
	}

	/**
	 * 用户输入过滤
	 * @return
	 */
	public function requestCheck($data){

		if(is_array($data)){
			foreach($data as $key =>&$d){
				if(is_array($d)){
					$this->inputCheck($d);
				}else{
					$d = trim($d);
					$d = addslashes($d);
					$d = htmlspecialchars($d);
				}
			}
		}else{
			$data = trim($data);
			$data = addslashes($data);
			$data = htmlspecialchars($data);
		}

		return $data;
	}

	//读取接口
	public function curl_get($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		$data = json_decode($result,true);
		return $data;
	}

	//获取随机TOKEN
	public function generateToken(){
		$randChars = $this->getRandChar(32);
		return $randChars;
	}

	//获取指定长度的随机字符串
	public  function getRandChar($length){
		$str = null;
		$strPol = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
		$max = strlen($strPol) -1;

		for($i= 0; $i < $length; $i++){
			$str .= $strPol[rand(0,$max)];
		}
		return $str;
	}

	public function createSN($type = 0){
		$str = null;
		if($type){
			$str .='EG';
		}else{
			$str .='CG';
		}
		$str .= date('YmdHis',time());
		return $str;
	}

	//递归出节点列表
	public function  getRbacTree($nodes=[] ,$pid = 0){
		 $nodeList =array();
		foreach ($nodes as $key => $v){
			if($v['pid'] == $pid){
				$v['son'] = $this->getRbacTree($nodes,$v['id']);
				if($v['son']==null){
					unset($v['son']);
				}
				$nodeList[]= $v;

			}
		}
		return $nodeList;

	}

	//递归出节点列表
	public function  getNodeTree($nodes=[] ,$pid = 0,$level = 0){
		static $nodeList =array();
		foreach ($nodes as $key => $v){
			if($v['pid'] == $pid){
				 $v['level']=$level;
				 $v['node_title'] = '|-' . str_repeat('-------',$level) . $v['node_title'];
				 $nodeList[]=$v;
				 $this->getNodeTree($nodes,$v['id'],$level+1);
			}
		}
		return $nodeList;
	}


}
