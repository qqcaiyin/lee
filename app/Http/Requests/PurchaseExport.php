<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\AuthenticationException;

class PurchaseExport extends FormRequest
{

    //
	public function authorize(){
		return true;
	}

	public function rules(){
		$rules = [
			'starttime' => 'required',
			'endtime' => 'required',
		];
		return $rules;
	}

	public function messages(){
		$message = [
			'starttime.required' => '开始时间异常',
			'endtime.required' => '结束时间异常',
		];
		return $message;
	}

}
