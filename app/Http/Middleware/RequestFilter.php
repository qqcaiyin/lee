<?php

namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;
use Illuminate\Support\Facades\Session;


class RequestFilter
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$input = $request->all();
		if($input){
			$input = $this->requestCheck($input);
			$request->merge($input);
		}

		return  $next($request);
	}


	/**
	 * 用户输入过滤
	 */
	public function requestCheck($data){
		if(is_array($data)){
			//dd($data);
			foreach($data as $key =>&$d){
				if(is_array($d)){
				//	dd($d);
					$this->requestCheck($d);
				}else{
					if($key == 'content'){
						;
					}else{
						$d = trim($d);
						$d = addslashes($d);
						$d = htmlspecialchars($d);

					}
				}
			}
		}else{
				$data = trim($data);
				$data = addslashes($data);
				$data = htmlspecialchars($data);
		}

		return $data;
	}

}
